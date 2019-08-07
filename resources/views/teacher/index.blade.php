@extends('layouts.teacher')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-success info">
                    <div class="card-header">
                        <h3>TEACHER INFORMATION</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="student_name">MATRICULE: {{ $teacher->teacher_name }} {{ $teacher->teacher_surname }}</label>
                        </div>
                        <div class="form-group">
                            <label for="matricule">Matricule: {{ $teacher->teacher_matricule }}</label>
                        </div>
                        <div class="form-group">
                            <label for="tel">Phone number: {{ $teacher->teacher_phone }}</label>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: {{ $teacher->teacher_email }}</label>
                        </div>
                        <div class="form-group">
                            <label for="dob">Grade: {{ $teacher->teacher_grade }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
