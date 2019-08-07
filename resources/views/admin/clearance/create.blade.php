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
            <li class="breadcrumb-item">Manage Clearance</li>
            <li class="breadcrumb-item active">Create clearance for a student</li>
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
                        <strong>Add new course</strong>
                        <small>in the system</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('clearance_form.store') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="{{$clearance->id}}">
                                <input type="hidden" disabled class="form-control" name="student_id" value="{{ $clearance->student_id }}">
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="library">Library</label>
                                        <select name="library" id="library" class="form-control">
                                            <option value="select a value" disabled selected>select a value</option>
                                            <option value="1">OK</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exam_record">Exam record</label>
                                        <select name="exam_record" id="exam_record" class="form-control">
                                            <option value="select a value" disabled selected>select a value</option>
                                            <option value="1">OK</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <select name="department" id="department" class="form-control">
                                            <option value="select a value" disabled selected>select a value</option>
                                            <option value="1">OK</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="clearance_date">Date</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control" name="clearance_date" id="clearance_date" required>
                                    <div class="input-group-addon">
                                        <span class="mdi mdi-calendar"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="remark">Remark</label>
                                <textarea name="remark" id="remark" class="form-control" cols="30" rows="2"></textarea>
                            </div>

                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-success">Create Clearance</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/libs/jquery/dist/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=", crossorigin="anonymous"></script>
    <!-- datepicker -->
    <script src="/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- jquery-labelauty -->
    <script src="/libs/jquery-labelauty/source/jquery-labelauty.js"></script>
@endsection
