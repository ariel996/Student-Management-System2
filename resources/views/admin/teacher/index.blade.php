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
            <li class="breadcrumb-item active">List of teachers</li>
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
                        <a href="{{ route('teacher.create') }}" class="nav-link btn btn-primary" style="text-align: right;">ADD</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Matricule</th>
                                    <th>Name</th>
                                    <th>Grade</th>
                                    <th>Phone</th>
                                    <th>email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{$teachers->render()}}
                            </tfoot>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->id }}</td>
                                        <td>{{ $teacher->teacher_matricule }}</td>
                                        <td>{{ $teacher->teacher_name }}</td>
                                        <td>{{ $teacher->teacher_grade }}</td>
                                        <td>{{ $teacher->teacher_phone }}</td>
                                        <td>{{ $teacher->teacher_email }}</td>
                                        <td>
                                            <a href="{{ route('teacher.edit', [$teacher->id]) }}" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i>
                                            </a>
                                            <a href="{{ route('teacher.destroy', [$teacher->id]) }}" data-toggle="tooltip" data-original-title="Delete">
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
