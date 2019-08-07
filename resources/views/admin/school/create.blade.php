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
            <li class="breadcrumb-item">Manage school</li>
            <li class="breadcrumb-item active">Create school</li>
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
            <div class="col-md-4 col-xs-4">
                <div class="card">
                    <div class="card-header text-theme">
                        <strong>Create School</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('school.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

        
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="school_code">School Code</label>
                                        <input type="text" class="form-control" name="school_code" id="school_code" placeholder="Enter school code" required />
                                    </div>
                                </div>
                            </div><!-- end of row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="school_name">School Name</label>
                                        <input type="text" class="form-control" name="school_name" id="school_name" placeholder="Enter school name" required />
                                    </div>
                                </div>
                            </div><!-- end of row -->
        
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">School Description</label>
                                        <textarea name="school_description" id="description" cols="10" rows="3" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div><!-- end of row -->

                            <button type="submit" class="btn btn-theme btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                        </form>
                    </div>
                </div>
            </div><!-- end col-md-6 -->

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-theme">
                        <strong>List of School</strong>
                        <small>Saved</small>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>School code</th>
                                    <th>School name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{$schools->render()}}
                            </tfoot>
                            <tbody>
                                @foreach ($schools as $school)
                                    <tr>
                                        <td>{{ $school->id }}</td>
                                        <td>{{ $school->school_code }}</td>
                                        <td>{{ $school->school_name }}</td>
                                        <td>
                                            <a href="/admin/school/{{$school->id}}/edit" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i>
                                            </a>
                                            <a href="/admin/school/{{$school->id}}" data-toggle="tooltip" data-original-title="Delete">
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