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
            <li class="breadcrumb-item active">List of student registered for courses</li>
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
                        <strong>List of student registered for courses</strong>
                        <small>saved</small>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>STUDENT NAME</th>
                                    <th>DEPARTMENT</th>
                                    <th>COURSE</th>
                                    <th>Semester</th>
                                    <th>CA/30</th>
                                    <th>Exam/70</th>
                                    <th>Resit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{ $student_courses->render() }}
                            </tfoot>
                            <tbody>
                                @foreach ($student_courses as $student_course)
                                    <tr>
                                        <td>{{ $student_course->id }}</td>
                                        <td>{{ $student_course->student->student_name }}</td>
                                        <td>{{ $student_course->student->department->department_name }}</td>
                                        <td>{{ $student_course->course->course_name }}</td>
                                        <td>{{ $student_course->course->semester->num_semester }}</td>
                                        <td>{{ $student_course->student->mark->mark_ca }}</td>
                                        <td>{{ $student_course->student->mark->mark_exam }}</td>
                                        <td>{{ $student_course->student->mark->mark_resit }}</td>
                                        <td>
                                            <a href="/teacher/mark/{{ $student_course->id }}/edit" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i>
                                            </a>
                                            <a href="{{ route('mark.destroy', $student_course->id) }}" data-toggle="tooltip" data-original-title="Delete">
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
