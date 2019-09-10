@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageHeader')
    {{$student->fName}} {{$student->lName}}
@endsection
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>

                <strong><span style="color: red"><i class="fa fa-heart"></i></span> Success!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>
        </div>
    @endif
    <div class="col-md-12  container" style="padding: 13px;">
        <a href="/teachers" class="btn btn-md btn-success -pull-right"><span><i class="fa fa-backward"></i> </span> Go Back</a>
    </div>
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card shadow mb-12">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><span style="padding-right: 13px"><i class="fa fa-pen"></i></span>Actions</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <a style="padding:0 13px 0 13px;width: 100%" href="/teachers/{{$student->id}}/edit" class="btn btn-warning btn-lg">Update Data</a>
                </div>
                    <form id="{{$student->id}}" action="/teachers/{{$student->id}}" method="post">
                        @csrf
                        <input type="hidden" value="DELETE" name="_method"/>
                        <div class="form-group">
                            <button style="padding:0 13px 0 13px;width: 100%" onclick="areYou({{$student->id}})" class="btn btn-danger btn-lg">Delete Data</button>
                        </div>
                    </form>
                    <script>
                        function areYou(id){
                            if(confirm("Proceed with deletion?")){
                                document.getElementById(id).submit();
                                //window.location.href="/teachers/"+id;
                            }else{
                                return 1;
                            }
                        }
                    </script>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="card shadow mb-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><span style="padding-right: 13px"><i class="fa fa-clipboard-list"></i></span>{{$student->fName}} {{$student->lName}}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fName">First Name: </label>
                            <input type="text" disabled class="form-control form-control-user" name="fName" value="{{$student->fName}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fName">Last Name: </label>
                            <input type="text" class="form-control form-control-user" name="lName" value="{{$student->lName}}" disabled >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fName">Username: </label>
                            <input type="text" class="form-control form-control-user" value="{{$student->username}}" disabled >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender:</label>
                            <input type="text" disabled class="form-control form-control-user" value="{{$student->gender}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="class">Department</label>
                            <input type="text" disabled value="{{\App\Departments::find($student->user_departments_id)->name}}" class="form-control form-control-user">
                            <input type="hidden" value="3" name="role">
                            <input type="hidden" value="16" name="department">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow mb-12">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><span style="padding-right: 13px"><i class="fa fa-user-circle"></i></span>Profile</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <img height="200px" width="200px" class="img-profile rounded-circle" onerror="this.onerror=null;this.src='{{asset('img/default.png')}}';" src="{{asset('img/dps/'.$student->id.'.jpg')}}">
                </div>
            </div>
        </div>
    </div>
@endsection