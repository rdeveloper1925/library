@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageHeader')
    TEACHERS
@endsection
@section('content')
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="/teachers/create" class="btn btn-sm btn-success"><span style="padding-right: 10px"><i class="fa fa-plus-square"></i> </span>Create New Teacher</a>
    </div>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Success!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>
        </div>
    @endif
    <div class="card shadow mb-4 col-md-12 pl-0 pr-0">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Teachers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->fName}}</td>
                            <td>{{$user->lName}}</td>
                            <td>{{\App\Departments::find($user->dptName)->name}}</td>
                            <td>{{$user->roleName}}</td>
                            <td>{{$user->gender}}</td>
                            <td><a href="/teachers/{{$user->id}}" class="btn btn-success pt-1 btn-sm"><span><i class="fa fa-file-import"></i> </span></a><br>
                                <a href="/teachers/{{$user->id}}/edit" class="btn btn-warning pt-1 btn-sm"><span><i class="fa fa-pen"></i> </span></a><br>
                                <form id="{{$user->id}}" action="/teachers/{{$user->id}}" method="post">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method"/>
                                    <button onclick="areYou({{$user->id}})" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i> </span></button>
                                </form>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
                <script>
                    function areYou(id){
                        if(confirm("Proceed with deletion?")){
                            document.getElementById(id).submit();
                            //window.location.href="/teachers/"+id;
                        }else{

                        }
                    }
                </script>
            </div>
        </div>
    </div>
@endsection