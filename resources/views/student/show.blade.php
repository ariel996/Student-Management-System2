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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-success info">
                    <div class="card-header">
                        <h3>STUDENT INFORMATION</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="student_name">Student names: {{ $student->student_name }} {{ $student->student_surname }}</label>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of birth: {{ $student->student_dob }}</label>
                        </div>
                        <div class="form-group">
                            <label for="pob">Place of birth: {{ $student->student_pob }}</label>
                        </div>
                        <div class="form-group">
                            <label for="matricule">Matricule: {{ $student->student_matricule }}</label>
                        </div>
                        <div class="form-group">
                            <label for="tel">Phone number: {{ $student->student_phone }}</label>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: {{ $student->student_email }}</label>
                        </div>
                        <div class="form-group">
                            <label for="dob">School: {{ $student->school->school_name }}</label>
                        </div>
                        <div class="form-group">
                            <label for="dob">Department: {{ $student->department->department_name }}</label>
                        </div>
                        <div class="form-group">
                            <label for="dob">Level: {{ $student->student_level }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
