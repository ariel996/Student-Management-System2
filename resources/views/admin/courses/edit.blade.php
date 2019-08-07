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
            <li class="breadcrumb-item">Manage Courses</li>
            <li class="breadcrumb-item active">Edit course</li>
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
                        <strong>Edit new course</strong>
                        <small>in the system</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('course.update', [$course->id]) }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="school">School</label>
                                <select name="school_id" id="school_id" class="form-control">
                                    <option value="Select a school" selected disabled>Select a school</option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select name="department_id" id="department_id" class="form-control">

                                </select>
                            </div>
                           {{-- {{ csrf_field() }}--}}

                            <div class="form-group">
                                <label for="batche_id">Level</label>
                                <select name="level" id="level" class="form-control">
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
                                <label for="course_code">Course Code</label>
                                <input type="text" class="form-control" name="course_code" id="course_code" value="{{ $courses->course_code }}" placeholder="Enter a course code" required/>
                            </div>

                            <div class="form-group">
                                <label for="course_name">Course Name</label>
                            <input type="text" class="form-control" name="course_name" id="course_name" value="{{ $courses->course_name }}" placeholder="Enter a course name" required/>
                            </div>

                            <div class="form-group">
                                <label for="course_type">Course Type</label>
                                <select name="course_type" id="course_type" class="form-control">
                                    @foreach ($course_type as $item)
                                        <option value="{{ $item->id }}">{{ $item->code_type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="course_credit">Course Credit</label>
                                <input type="text" class="form-control" name="course_credit" id="" value="{{ $courses->course_credit }}" placeholder="Enter a credit value" required/>
                            </div>

                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-primary" id="ajaxSubmit">Submit</button>
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
