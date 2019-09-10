@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageHeader')
    DASHBOARD
@endsection
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('fail'))
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>

                <strong><span style="color: #ff0000"><i class="fa fa-key"></i></span> Unauthorized!</strong> {{\Illuminate\Support\Facades\Session::get('fail')}}
            </div>
        </div>
    @endif
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-circle fa-2x text-gray-500"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Books</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$books}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-500"></i>
                    </div>
                </div>
                @if(Auth::user()->roles_id!=3)
                <div class="row">
                    <div class="col-md-12">
                        <a href="/books" class="btn-outline-primary btn btn-sm">View Details</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$students}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-friends fa-2x text-gray-500"></i>
                    </div>
                </div>
                @if(Auth::user()->roles_id!=3)
                <div class="row">
                    <div class="col-md-12">
                        <a href="/students"  class="btn-outline-primary btn btn-sm">View Details</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Teachers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$teachers}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-500"></i>
                    </div>
                </div>
                @if(Auth::user()->roles_id!=3)
                <div class="row">
                    <div class="col-md-12">
                        <a href="/teachers"  class="btn-outline-primary btn btn-sm">View Details</a>
                    </div>
                </div>
                    @endif
            </div>
        </div>
    </div>
@endsection
@section('projection')
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
        </div>
        <div class="card-body">
            <h4 class="small font-weight-bold">Number of students <span class="float-right">{{$students}}</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-danger" style="width: {{($students/($students+$teachers+$librarians))*100}}%" role="progressbar"  aria-valuenow="{{$students}}" aria-valuemin="0" aria-valuemax="{{$students+$teachers+$librarians}}"></div>
            </div>
            <h4 class="small font-weight-bold">Number of Teachers <span class="float-right">{{$teachers}}</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-warning" style="width: {{($teachers/($students+$teachers+$librarians))*100}}%" role="progressbar"  aria-valuenow="{{$teachers}}" aria-valuemin="0" aria-valuemax="{{$students+$teachers+$librarians}}"></div>
            </div>
            <h4 class="small font-weight-bold">Number of Books <span class="float-right">{{$books}}</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;"  aria-valuenow="{{$books}}" aria-valuemin="0" aria-valuemax="{{$books}}"></div>
            </div>
            <h4 class="small font-weight-bold">Number of Librarians <span class="float-right">{{$librarians}}</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-info" style="width: {{($students/($students+$teachers+$librarians))*100}}%" role="progressbar"  aria-valuenow="{{$librarians}}" aria-valuemin="0" aria-valuemax="{{$students+$teachers+$librarians}}"></div>
            </div>
        </div>
    </div>
@endsection
@section('charts')
    <div class="col-md-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Composition</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center ">
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #df3bc9"></i> Students
                        <input type="hidden" value="{{$students}}" id="student"/>
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #6237c8;"></i> Teachers
                                                <input type="hidden" value="{{$teachers}}" id="teacher"/>

                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #24b1cc"></i> Librarians
                                                <input type="hidden" value="{{$librarians}}" id="librarian"/>

                    </span>
                </div>
            </div>
        </div>
    </div>
    @endsection