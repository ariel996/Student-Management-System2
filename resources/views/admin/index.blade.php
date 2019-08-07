@extends('layouts.admin')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item">
            <a href="{{ route('admin') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-accent-theme">
                    <div class="card-body">
                        <div class="analystics-list">
                            <div class="clearfix">
                                <div class="float-left">
                                    <div class="h5">Students</div>
                                    <div class="h3 text-theme">{{ $student }}</div>
                                    <div class="h6 text-info">-4.37%
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <div class="h1 text-info">
                                        <span class="fa fa-signal"></span>
                                    </div>
                                </div>
                                {{-- end clearfix --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end card --}}

            <div class="col-md-3">
                <div class="card card-accent-theme">
                    <div class="card-body">
                        <div class="analystics-list">
                            <div class="clearfix">
                                <div class="float-left">
                                    <div class="h5">Users</div>
                                    <div class="h3 text-theme">{{ $count }}</div>
                                    <div class="h6 text-info">-4.37%
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <div class="h1 text-info">
                                        <span class="fa fa-signal"></span>
                                    </div>
                                </div>
                                {{-- end clearfix --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                {{-- end card --}}

            <div class="col-md-3">
                <div class="card card-accent-theme">
                    <div class="card-body">
                        <div class="analystics-list">
                            <div class="clearfix">
                                <div class="float-left">
                                    <div class="h5">Schools</div>
                                    <div class="h3 text-theme">{{ $school }}</div>
                                    <div class="h6 text-info">-4.37%
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <div class="h1 text-info">
                                        <span class="fa fa-signal"></span>
                                    </div>
                                </div>
                                {{-- end clearfix --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- end card --}}

        <div class="col-md-3">
            <div class="card card-accent-theme">
                <div class="card-body">
                    <div class="analystics-list">
                        <div class="clearfix">
                            <div class="float-left">
                                <div class="h5">Teachers</div>
                                <div class="h3 text-theme">{{ $teacher }}</div>
                                <div class="h6 text-info">-4.37%
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </div>
                            <div class="float-right">
                                <div class="h1 text-info">
                                    <span class="fa fa-signal"></span>
                                </div>
                            </div>
                            {{-- end clearfix --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
            {{-- end card --}}
        </div>
    </div>
@endsection
