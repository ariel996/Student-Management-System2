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
            <li class="breadcrumb-item">Manage Teachers</li>
            <li class="breadcrumb-item active">List of teachers courses</li>
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
                        <strong>List of teachers</strong>
                        <small>Saved</small>
                        <a href="{{ route('assign_course.create') }}" class="nav-link btn btn-primary" style="text-align: right;">ADD</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TEACHER NAME</th>
                                    <th>COURSE NAME</th>
                                    <th>DEPARTMENT NAME</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{$course_teaches->render()}}
                            </tfoot>
                            <tbody>
                                @foreach ($course_teaches as $course)
                                    <tr>
                                        <td>{{ $course->id }}</td>
                                        <td>{{ $course->teacher->teacher_name }}</td>
                                        <td>{{ $course->course->course_name }}</td>
                                        <td>{{ $course->department->department_name }}</td>
                                        <td>
                                            <a href="{{ route('assign_course.edit', [$course->id]) }}" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i>
                                            </a>
                                            <a href="{{ route('assign_course.destroy', [$course->id]) }}" data-toggle="tooltip" data-original-title="Delete">
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
    <!-- multiselect -->
    <script src="/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="/libs/tables-datatables/dist/datatables.min.js"></script>
@endsection
