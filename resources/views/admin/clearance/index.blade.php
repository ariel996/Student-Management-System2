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
            <li class="breadcrumb-item">Manage Clearance</li>
            <li class="breadcrumb-item active">List of student apply</li>
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
                        <strong>List of student apply for clearance</strong>
                        <small>Saved</small>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>STUDENT NAME</th>
                                    <th>SCHOOL</th>
                                    <th>DEPARTMENT</th>
                                    <th>REMARK</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{$clearance->render()}}
                            </tfoot>
                            <tbody>
                                @foreach ($clearance as $cleare)
                                    <tr>
                                        <td>{{ $cleare->id }}</td>
                                        <td>{{ $cleare->student->student_name }}</td>
                                        <td>{{ $cleare->student->school->school_name }}</td>
                                        <td>{{ $cleare->student->department->department_name }}</td>
                                        <td>{{ $cleare->remark }}</td>
                                        <td>
                                            <a href="{{ route('clearance_form.edit', [$cleare->id]) }}" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i>
                                            </a>
                                            <a href="{{ route('clearance_form.destroy', [$cleare->id]) }}" data-toggle="tooltip" data-original-title="Delete">
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
