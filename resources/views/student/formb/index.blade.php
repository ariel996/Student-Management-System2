@extends('layouts.student')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item">
            <a href="{{ route('student') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('course_registration.create') }}">Course Registration</a>
            </li>
            <li class="breadcrumb-item active">Form B</li>
    </ol>
    <!-- end breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('student.store') }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-muted">COURSES REGISTERED</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>COURSE CODE</th>
                                        <th>COURSE NAME</th>
                                        <th>CREDIT VALUE</th>
                                        <th>SIGNATURE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student_course as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->course->course_code }}</td>
                                            <td>{{ $item->course->course_name }}</td>
                                            <td>{{ $item->course->course_credit }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <a href="{{ route('download_pdf') }}" class="btn btn-sm btn-info">DOWNLOAD as PDF</a>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/libs/tables-datatables/dist/datatables.min.js"></script>
@endsection
