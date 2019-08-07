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
            <li class="breadcrumb-item">Manage school</li>
            <li class="breadcrumb-item active">Create complaint</li>
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
                        <strong>List of complaint</strong>
                        <small>sent</small>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Complaint Code</th>
                                    <th>Complaint Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{$complaints->render()}}
                            </tfoot>
                            <tbody>
                                @foreach ($complaints as $complaint)
                                    <tr>
                                        <td>{{ $complaint->id }}</td>
                                        <td>{{ $complaint->complaint_code }}</td>
                                        <td>{{ $complaint->complaint_type }}</td>
                                        @if ($complaint->complaint_status == 0)
                                            <td><i class="badge-pill badge-warning">Pending</i></td>
                                        @else
                                            <td><i class="badge-pill badge-success">Treated</i></td>
                                        @endif
                                        <td>
                                            <a href="/student/complaint/{{ $complaint->id }}/edit" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i>
                                            </a>
                                            <a href="/student/complaint/{{ $complaint->id }}" data-toggle="tooltip" data-original-title="Delete">
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
