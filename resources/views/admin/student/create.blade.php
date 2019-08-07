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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('manage_student.store') }}" method="post" class="form-horizontal">
                 {{ csrf_field() }}
                    <div class="col-6">
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        </div>
                        <div class="form-group">
                            <label for="student_matricule">Matricule:</label>
                            <input type="text" name="student_matricule" id="student_matricule" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="student_name">First name:</label>
                            <input type="text" name="student_name" id="student_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="student_surname">Last name:</label>
                            <input type="text" name="student_surname" id="student_surname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="student_dob">Date of birth:</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control" name="student_dob" id="student_dob" required>
                                <div class="input-group-addon">
                                    <span class="mdi mdi-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="student_pob">Place of birth:</label>
                            <input type="text" name="student_pob" id="student_pob" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="student_phone">Phone:</label>
                            <input type="tel" name="student_phone" id="student_phone" class="form-control" required>
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
                            <label for="student_address">Address:</label>
                            <input type="text" name="student_address" id="student_address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="student_email">email:</label>
                            <input type="email" name="student_email" id="student_email" class="form-control" required>
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
    <!-- datepicker -->
    <script src="/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
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
        });
    </script>
@endsection
