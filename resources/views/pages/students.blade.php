@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageHeader')
    STUDENTS
@endsection
@section('content')
    @if(Auth::user()->roles_id!=3)
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="/students/create" class="btn btn-sm btn-success"><span style="padding-right: 10px"><i class="fa fa-plus-square"></i> </span>Create New Student</a>
    </div>
    @endif
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
    <div class="card shadow mb-4 col-md-12" style="padding: 0 0;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Students</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Class</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Gender</th>
                        @if(Auth::user()->roles_id!=3)
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->fName}}</td>
                                <td>{{$user->lName}}</td>
                                <td>{{$user->className}}</td>
                                <td>{{\App\Departments::find($user->dptName)->name}}</td>
                                <td>{{$user->roleName}}</td>
                                <td>{{$user->gender}}</td>
                                @if(Auth::user()->roles_id!=3)
                                <td><a href="/students/{{$user->id}}/view" class="btn btn-success btn-sm"><span><i class="fa fa-file-import"></i> </span></a>
                                    <a href="/students/{{$user->id}}/edit" class="btn btn-warning btn-sm"><span><i class="fa fa-pen"></i> </span></a>
                                    <button onclick="areYou({{$user->id}})" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i> </span></button></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Class</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Gender</th>
                        @if(Auth::user()->roles_id!=3)
                            <th>Action</th>
                        @endif
                    </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
                <script>
                    function areYou(id){
                        if(confirm("Proceed with deletion?")){
                            window.location.href="/students/"+id+"/delete";
                        }else{

                        }
                    }
                </script>
            </div>
        </div>
    </div>
@endsection