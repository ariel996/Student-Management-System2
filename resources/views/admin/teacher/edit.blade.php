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
            <li class="breadcrumb-item">Manage teachers</li>
            <li class="breadcrumb-item active">Edit new teacher</li>
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
                        <strong>Edit teacher</strong>
                        <small>in the system</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.update', [$teacher->id]) }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="matricule">Matricule</label>
                                <input type="text" class="form-control" name="teacher_matricule" value="{{ $teacher->teacher_matricule }}" id="matricule" placeholder="Enter a teacher matricule" required/>
                            </div>

                            <div class="form-group">
                                <label for="teacher_name">Names</label>
                                <input type="text" class="form-control" name="teacher_name" value="{{ $teacher->teacher_name }}" id="teacher_name" placeholder="Enter a teacher names" required/>
                            </div>

                            <div class="form-group">
                                <label for="teacher_surname">Surnames</label>
                                <input type="text" class="form-control" name="teacher_surname" value="{{ $teacher->teacher_surname }}" id="teacher_surname" placeholder="Enter a teacher surnames" required/>
                            </div>

                            <div class="form-group">
                                <label for="teacher_grade">Grade</label>
                                <input type="text" class="form-control" name="teacher_grade" value="{{ $teacher->teacher_grade }}" id="teacher_grade" placeholder="Enter a teacher grade" required/>
                            </div>

                            <div class="form-group">
                                <label for="teacher_phone">Phone</label>
                                <input type="text" class="form-control" name="teacher_phone" value="{{ $teacher->teacher_phone }}" id="teacher_phone" placeholder="Enter a teacher phone" required/>
                            </div>

                            <div class="form-group">
                                <label for="teacher_email">Email</label>
                                <input type="email" name="teacher_email" value="{{ $teacher->teacher_email }}" id="teacher_email" class="form-control" placeholder="enter a valid email address" required/>
                            </div>

                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </div>
                        </form>
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
