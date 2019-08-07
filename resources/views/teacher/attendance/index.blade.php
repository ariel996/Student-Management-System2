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
                                    <th>TEACHER NAME</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                    <th>ATTENDED</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{$attendances->render()}}
                            </tfoot>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->id }}</td>
                                        <td>{{ $attendance->student->student_name }}</td>
                                        <td>{{ $attendance->teacher->teacher_name }}</td>
                                        <td>{{ $attendance->attendance_date }}</td>
                                        <td>{{ $attendance->start_time}} - {{ $attendance->end_time }}</td>
                                        @if ($attendance->attended == 0)
                                            <td><i class="badge-pill badge-warning">Absent</i></td>
                                        @else
                                            <td><i class="badge-pill badge-success">Present</i></td>
                                        @endif
                                        <td>
                                            {{--<a href="/teacher/attendance/{{ $attendance->id }}/edit" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i>
                                            </a>--}}
                                            <a href="{{ route('attendance.destroy', $attendance->id) }}" data-toggle="tooltip" data-original-title="Delete">
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
