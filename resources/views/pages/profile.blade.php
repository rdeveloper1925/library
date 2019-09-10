@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageHeader')
    User Profile
@endsection
@section('content')
    <!-- Dropdown Card Example -->
    @if($errors)
        @foreach($errors as $error)
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Error!</strong> {{$error}}
                </div>
            </div>
        @endforeach
    @endif
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><span style="color: red;"><i class="fa fa-heart"></i> </span> Success!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>
        </div>
    @endif
    <div class="col-md-8">
        <div class="card shadow mb-6">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Actions:</div>
                        <a style="background-color: #adb5bd" class="dropdown-item" onclick="clicked()" href="#"><strong>Edit</strong></a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="/profile/{{$profile->id}}/edit" method="post">
                    @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="fName">First Name: </label>
                        <input type="text" class="form-control form-control-user" value="{{$profile->fName}}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fName">Last Name: </label>
                        <input type="text" class="form-control form-control-user" value="{{$profile->lName}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="gender">Gender</label>
                        <input id="genshow" type="text" disabled value="{{$profile->gender}}" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fName">Department: </label>
                        <input type="number" class="form-control form-control-user" value="{{$profile->dptName}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fName">Role: </label>
                        <input type="text" class="form-control form-control-user" value="{{$profile->roleName}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fName">Class: </label>
                        <input type="text" class="form-control form-control-user" value="{{$profile->className}}" disabled>
                    </div>
                </div>
                    <input id="submision" class="btn btn-outline-warning btn-block btn-lg form-control-user" style="display: none" type="submit" value="Save Edit">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile Picture</h6>
            </div>
            <div class="card-body align-content-center">
                <center>
                <img height="200px" width="200px" class="img-profile rounded-circle" onerror="this.onerror=null;this.src='{{asset('img/default.png')}}';" src="{{asset('img/dps/'.Auth::user()->id.'.jpg')}}">
                </center>
                <form action="/uploadDp" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="dp" class="form-control-file form-control-user" required>
                    </div>
                    <input class="btn btn-block btn-success" type="submit" value="Upload">
                </form>
            </div>
        </div>
    </div>

@endsection
@section('additionalJs')
    <script>
        function clicked(){
            //$('.form-group input').removeAttr('disabled');
            $('#genshow').css('display','none');
            $('#gendo').css('display','block');
            $('#submision').css('display','block');
        }
    </script>
@endsection