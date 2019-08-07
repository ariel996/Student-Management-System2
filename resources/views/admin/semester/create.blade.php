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
            <li class="breadcrumb-item">Settings</li>
            <li class="breadcrumb-item active">Semester</li>
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
            <div class="col-md-12 col-sm-6 col-xs-4 col-lg-12">
                <div class="card">
                    <div class="card-header text-theme">
                        <strong>Add semester</strong>
                        <small>in the system</small>
                    </div>
                    <div class="card-body">
                        <form action="{{route('semester.store')}}" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="annee_univ">Academic year:</label>
                                <input type="text" name="annee_univ" id="annee_univ" class="form-control" placeholder="enter academic year" required/>
                            </div>

                            <div class="form-group">
                                <label for="num_semester">Semester number:</label>
                                <select name="num_semester" id="num_semester" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>

                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
