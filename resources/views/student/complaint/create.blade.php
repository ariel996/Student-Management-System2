@extends('layouts.student')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item">
            <a href="{{ route('student') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Complaint</li>
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
                <form action="{{ route('complaint.store') }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="col-6">

                        <div class="form-group">
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                        </div>

                        <div class="form-group">
                            <label for="complaint_type">Type:</label>
                            <select name="complaint_type" id="complaint_type" class="form-control">
                                <option value="CA marks">CA marks</option>
                                <option value="CA marks">Exam marks</option>
                                <option value="CA marks">File Registration Problem</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="student_photo">Your message:</label>
                            <textarea name="complaint_message" id="complaint_message" cols="30" rows="10" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-theme btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                        <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
