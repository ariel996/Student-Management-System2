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
                        <a href="{{ route('attendance.create') }}"><button class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i>Back</button></a>
                        <strong>Mark attendance for {{ $student->student_name }}</strong>
                        <small>{{ $student->student_matricule }}</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('attendance.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="teacher_id" id="teacher_id" class="form-control" value="{{ $teacher->id }}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="student_id" id="student_id" class="form-control" value="{{ $student->id }}">
                            </div>
                            <div class="form-group">
                                <label for="attendance_date">Date:</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control" name="attendance_date" id="attendance_date" required>
                                    <div class="input-group-addon">
                                        <span class="mdi mdi-calendar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                            <label for="start_time">start time</label>
                                            <input type="text" class="form-control" value="13:14" name="start_time">
                                            <span class="input-group-addon">
                                                <span class="mdi mdi-timer"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                            <label for="end_time">end time</label>
                                            <input type="text" class="form-control" value="13:14" name="end_time">
                                            <span class="input-group-addon">
                                                <span class="mdi mdi-timer"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="attended">Attended:</label>
                                <select name="attented" id="attended" class="form-control">
                                    <option value="select a status" disabled selected>select a status</option>
                                    <option value="1">Attended</option>
                                    <option value="0">Not attended</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-theme btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- clockpicker -->
    <script src="/libs/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
    <!-- datepicker -->
    <script src="/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.clockpicker').clockpicker()
        })
    </script>
@endsection
