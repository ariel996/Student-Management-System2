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
            <li class="breadcrumb-item">Manage Complaints</li>
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
                        <strong>Manage complaint</strong>
                        <small>in the system</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('manageComplaint.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="{{ $complaints->id }}">
                            </div>
                            <div class="form-group">
                                <label for="complaint_message">Message</label>
                                <textarea name="complaint_message" id="complaint_message" cols="10" rows="5" class="form-control"> {{ $complaints->complaint_message }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="status" class="text-white">Status</label>
                                <select name="complaint_status" id="complaint_status" class="form-control">
                                    @if ($complaints->complaint_status == 0)
                                        <option value="0" selected>Pending</option>
                                        <option value="1">Treated</option>
                                    @else
                                        <option value="1" selected>Treated</option>
                                        <option value="0">Pending</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="button" class="btn btn-primary" value="Download proof">
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
