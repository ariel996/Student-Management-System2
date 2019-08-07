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
                <div class="card card-accent-success info">
                    <div class="card-header">
                        <h3>STUDENT CLEARANCE FORM</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('apply_clearance.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                           {{-- @if ($student->clearance->remark == 'ok')--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        click to download
                                        <a href="{{ route('downloadClearance') }}" class="btn btn-sm btn-info">DOWNLOAD as PDF</a>
                                    </div>
                                </div>
                            {{--@else--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="student_id">Click the button below to apply</label>
                                        <input type="hidden" name="student_id" id="student_id" class="form-control" value="{{ $student->id }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-theme btn-sm"><i class="fa fa-dot-circle-o"></i> Apply</button>
                                    </div>
                                </div>
                            {{--@endif--}}
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
