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
            <li class="breadcrumb-item active">Create Speciality</li>
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
                        <strong>Create Speciality</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('speciality.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-sm-12">
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
                                </div>
                            </div><!-- end of row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="speciality_code">Speciality Code</label>
                                        <input type="text" class="form-control" name="speciality_code" id="speciality_code" placeholder="Enter speciality code" required />
                                    </div>
                                </div>
                            </div><!-- end of row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="speciality_name">Speciality Name</label>
                                        <input type="text" class="form-control" name="speciality_name" id="speciality_name" placeholder="Enter speciality name" required />
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
                        <strong>List of specialities</strong>
                        <small>Saved</small>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Department Name</th>
                                    <th>Speciality code</th>
                                    <th>Speciality name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{$specialities->render()}}
                            </tfoot>
                            <tbody>
                                @foreach ($specialities as $speciality)
                                    <tr>
                                        <td>{{ $speciality->department->department_name }}</td>
                                        <td>{{ $speciality->speciality_code }}</td>
                                        <td>{{ $speciality->speciality_name }}</td>
                                        <td>
                                            <a href="/admin/speciality/{{ $speciality->id }}/edit" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i>
                                            </a>
                                            <a href="/admin/speciality/{{ $speciality->id }}" data-toggle="tooltip" data-original-title="Delete">
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
    <!-- multiselect -->
    <script src="/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="/libs/jquery/dist/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=", crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("select[name='school_id']").change(function() {
                var school_id = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: "<?php echo route('fetch_departments') ?>",
                    method: 'POST',
                    data: {school_id: school_id, _token:token},
                    success: function(data) {
                        $("select[name='department_id']").html('');
                        $("select[name='department_id']").html(data.options);
                    }
                })
            })
        });
    </script>
    <script src="/libs/tables-datatables/dist/datatables.min.js"></script>
@endsection
