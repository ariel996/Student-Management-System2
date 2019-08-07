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
            <li class="breadcrumb-item">Manage Mark</li>
            <li class="breadcrumb-item active">list of student marks</li>
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
                        <a href="{{ route('mark.index') }}"><button class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i>Back</button></a>
                        <strong>Mark marks for a student</strong>
                        <small>on {{ $student_course->student->student_name }}</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mark.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="#">
                                    <div class="form-group">
                                        <input type="hidden" name="course_id" id="course_id" class="form-control" value="{{ $student_course->course->id }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="student_id" id="student_id" class="form-control" value="{{ $student_course->student->id }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="semester_id" id="semester_id" value="{{ $student_course->course->semester->num_semester }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label for="mark_ca">CA mark:</label>
                                            <input type="number" id="mark_ca" name="mark_ca" class="form-control" placeholder="CA MARK">
                                            <span class="input-group-addon">
                                                /30
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label for="mark_exam">Exam mark:</label>
                                            <input type="number" name="exam_mark" id="exam_mark" class="form-control" placeholder="exam mark">
                                            <span class="input-group-addon">/70</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="reply">Any resit?</label>
                                    <input type="checkbox" name="reply" id="reply">
                                </div>
                                <div class="form-group">
                                    <div class="input-group" id="resit">
                                        <label for="resit">Resit:</label>
                                        <input type="number" name="resit" class="form-control" placeholder="resit">
                                        <span class="input-group-addon">/70</span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-dot-circle-o"></i> Update</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- datepicker -->
    <script src="/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#resit").hide();
            $("#reply").on('click', function(){
                $('#resit').show();
            })
        });
    </script>
@endsection
