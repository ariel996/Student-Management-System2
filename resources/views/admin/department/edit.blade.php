@section('style')
    <!-- data table -->
    <link rel="stylesheet" href="/libs/tables-datatables/dist/datatables.min.css">
@endsection
@extends('layouts.admin')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Manage school</li>
            <li class="breadcrumb-item active">Edit Department</li>
    </ol><!-- end breadcrumb -->
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-xs-4">
                <div class="card">
                    <div class="card-header text-theme">
                        <strong>Create Department</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('department.update', [$department->id]) }}" method="post">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="school_id">School name</label>
                                        <select name="school_id" id="school_id" class="form-control">
                                        <option value="{{ $department->school->id }}" selected disabled>{{ $department->school->school_name }}</option>
                                            @foreach ($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end of row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="department_code">Department Code</label>
                                    <input type="text" class="form-control" name="department_code" id="department_code" value="{{ $department->department_code }}" placeholder="Enter department code" required />
                                    </div>
                                </div>
                            </div><!-- end of row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="department_name">Department Name</label>
                                    <input type="text" class="form-control" name="department_name" id="department_name" value="{{ $department->department_name }}" placeholder="Enter department name" required />
                                    </div>
                                </div>
                            </div><!-- end of row -->

                            <button type="submit" class="btn btn-theme btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                        </form>
                    </div>
                </div>
            </div><!-- end col-md-6 -->

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-theme">
                        <strong>List of School</strong>
                        <small>Saved</small>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>School Name</th>
                                    <th>Department code</th>
                                    <th>Department name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{ $departments->render() }}
                            </tfoot>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $department->school->school_name }}</td>
                                        <td>{{ $department->department_code }}</td>
                                        <td>{{ $department->department_name }}</td>
                                        <td>
                                            <a href="/admin/department/{{ $department->id }}/edit" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i>
                                            </a>
                                            <a href="/admin/department/{{ $department->id }}" data-toggle="tooltip" data-original-title="Delete">
                                                <i class="fa fa-close text-danger"></i>
                                            </a>
                                        </td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/libs/tables-datatables/dist/datatables.min.js"></script>
@endsection