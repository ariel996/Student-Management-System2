@section('style')
    <!-- data table -->
    <link rel="stylesheet" href="/libs/tables-datatables/dist/datatables.min.css">
@endsection
@extends('layouts.student')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('student') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Manage Complaint</li>
            <li class="breadcrumb-item active">Edit complaint</li>
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
                        <strong>Edit complaint</strong>
                        <small>in the system</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('complaint.update', [$complaint->id]) }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="complaint_type">Type:</label>
                                <select name="complaint_type" id="complaint_type" class="form-control">
                                    <option value="CA marks">CA marks</option>
                                    <option value="Exam marks">Exam marks</option>
                                    <option value="File Registration Problem">File Registration Problem</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="complaint_message">Your message:</label>
                                <textarea name="complaint_message" id="complaint_message" cols="30" rows="10" class="form-control" required>{{ $complaint->complaint_message }}</textarea>
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
