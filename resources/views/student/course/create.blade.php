@extends('layouts.student')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item">
            <a href="{{ route('student') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
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
                <form action="{{ route('course_registration.store') }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="col-6">
                        <div class="form-group">
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                        </div>
                        <div class="form-group">
                            <label for="school_id">School:</label>
                            <select name="school_id" id="school_id" class="form-control">
                                <option value="--select your school --"> --select your school --</option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}"> {{ $school->school_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select name="department_id" id="department_id" class="form-control">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="student_level">Level:</label>
                            <select name="student_level" id="student_level" class="form-control">
                                <option value="select a level" disabled selected>select a level</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="card">
                                <div class="card-body">
                                    <div id="show_courses"></div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-theme btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                        <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
   <!-- form plugins example -->
   <script src="/js/form-plugins-example.js"></script>
    <script>
        $(document).ready(function(){
            $("#my-select").multiSelect()

            $("select[name='school_id']").change(function() {
                var school_id = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: "<?php echo route('fetch_departments') ?>",
                    method: 'POST',
                    data: {school_id: school_id, _token:token},
                    success: function(data) {
                        $("select[name='department_id']").html('');
                        $("select[name='department_id']").html(data.options);
                    }
                })
            })

            $("select[name='student_level']").change(function() {
                var department_id = $("select[name='department_id']").val();
                var token = $("input[name='_token']").val();
                var level = $(this).val();
                $.ajax({
                    url: "<?php echo route('fetch_courses') ?>",
                    method: 'POST',
                    data: {department_id: department_id, _token:token, level: level},
                    success: function(data) {
                        $("#show_courses").html('');
                        $("#show_courses").html(data.options);
                    }
                })
            })
        });
    </script>
       <!-- multiselect -->
   <script src="/libs/multiselect/js/jquery.multi-select.js"></script>
@endsection
