<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', ['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::paginate(15);
        $roles = Role::all();
        return view('admin.user.create', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'username' => 'required:max:20',
            'email' => 'required:max:255, email',
            'password' => 'required:max:12'
        ]);

        $user = User::create([
            'role_id' => $request->input('role_id'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        if ($user) {
            return redirect()->route('user_management.create')->with('success', 'User has been created successfully !!');
        }
        return redirect()->route('user_management.create')->with('errors', 'Error while creating new user into the system !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::find($user->id);
        $roles = Role::all();

        return view('admin.user.edit', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $userUpdate = User::where('id', $user->id)
                            ->update([
                                'role_id' => $request->input('role_id'),
                                'username' => $request->input('username'),
                                'password' => Hash::make($request->input('password'))
                            ]);
            if ($userUpdate) {
                return redirect()->route('user_management.create');
            }
            return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $findUser = User::find($user->id);
        if($findUser->delete()) {
            return redirect()->route('user_management.create')
                            ->with('success', 'User deleted successfully !!');
        }
        return back()->withInput()->with('errors', 'user could not be deleted !!');
    }
}
