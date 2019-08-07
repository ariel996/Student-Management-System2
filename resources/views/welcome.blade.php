@extends('master')
@section('title', 'Home')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row banner">
            <div class="col-md-12">
                <h1 class="text-center margin-top-100 editContent">Learning Laravel 5</h1>
                <h3 class="text-center margin-top-100 editContent">Building Practical Applications</h3>
            </div>
        </div>
    </div>
@endsection


