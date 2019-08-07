@section('style')
    <!-- data table -->
    <link rel="stylesheet" href="/libs/tables-datatables/dist/datatables.min.css">
@endsection
@extends('layouts.teacher')

@section('content')

    <!-- Breadcrumb -->
    <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Manage attendance</li>
            <li class="breadcrumb-item active">list of student attendance</li>
    </ol><!-- end breadcrumb -->
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div id="modalle">

</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-theme">
                        <strong>List of student attendance</strong>
                        <small>saved</small>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>STUDENT NAME</th>
                                    <th>DEPARTMENT</th>
                                    <th>SCHOOL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{$students->render()}}
                            </tfoot>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->student_name }} {{ $student->student_surname }}</td>
                                        <td>{{ $student->department->department_name }}</td>
                                        <td>{{ $student->school->school_name }}</td>
                                        <td>
                                            <a href="/teacher/attendance/{{ $student->id }}" data-toggle="tooltip" data-original-title="View">
                                                <i class="fa fa-eye text-inverse m-r-10"></i>
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
