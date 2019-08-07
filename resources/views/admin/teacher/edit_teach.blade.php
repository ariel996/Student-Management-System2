@extends('layouts.admin')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item">
            <a href="{{ route('admin') }}">Home</a>
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
                <form action="{{ route('assign_course.update', [$courseteach->id]) }}" method="post" class="form-horizontal">
                 {{ csrf_field() }}
                    <div class="col-6">
                        <div class="form-group">
                                <label for="teacher_id">Teacher name:</label>
                                <select name="teacher_id" id="teacher_id" class="form-control">
                                    <option value="select a teacher" selected disabled>select a teacher</option>
                                    @foreach ($teachers as $item)
                                        <option value="{{ $item->id }}">{{ $item->teacher_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="department_id">Department name:</label>
                            <select name="department_id" id="department_id" class="form-control">
                                <option value="select a department" selected disabled>select a department</option>
                                @foreach ($departments as $item)
                                    <option value="{{ $item->id }}">{{ $item->department_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course_id">Course name:</label>
                            <select name="course_id" id="course_id" class="form-control">

                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-theme btn-sm"><i class="fa fa-dot-circle-o"></i> Update</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- datepicker -->
    <script src="/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $("select[name='department_id']").change(function() {
                var department_id = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: "<?php echo route('fetch_courses') ?>",
                    method: 'POST',
                    data: {department_id: department_id, _token:token},
                    success: function(data) {
                        $("select[name='course_id']").html('');
                        $("select[name='course_id']").html(data.options);
                    }
                })
            })
        });
    </script>
@endsection
