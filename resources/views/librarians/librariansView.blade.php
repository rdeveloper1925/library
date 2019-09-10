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
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card shadow mb-12">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <a style="padding:0 13px 0 13px;width: 100%" href="/librarians/{{$student->id}}/edit" class="btn btn-warning btn-lg">Update Data</a>
                </div>
                <form id="{{$student->id}}" action="/librarians/{{$student->id}}" method="post">
                    @csrf
                    <input type="hidden" value="DELETE" name="_method"/>
                    <div class="form-group">
                        <button onclick="areYou({{$student->id}})" class="btn btn-danger btn-lg">Delete</button>
                    </div>
                </form>
                <script>
                    function areYou(id){
                        if(confirm("Proceed with deletion?")){
                            document.getElementById(id).submit();
                            //window.location.href="/librarians/"+id;
                        }
                    }
                </script>
            </div>
        </div>

    </div>
    <div class="col-md-9">
        <div class="card shadow mb-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{$student->fName}} {{$student->lName}}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="fName">First Name: </label>
                            <input type="text" disabled class="form-control form-control-user" name="fName" value="{{$student->fName}}" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Last Name: </label>
                            <input type="text" class="form-control form-control-user" name="lName" value="{{$student->lName}}" disabled >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Username: </label>
                            <input type="text" class="form-control form-control-user" value="{{$student->username}}" disabled >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="gender">Gender:</label>
                            <input type="text" disabled class="form-control form-control-user" value="{{$student->gender}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="class">Department: </label>
                            <input type="text" disabled value="{{\App\Departments::find($student->user_departments_id)->name}}" class="form-control form-control-user">
                            <input type="hidden" value="3" name="role">
                            <input type="hidden" value="16" name="department">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 justify-content-center">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection