@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageHeader')
    Create Librarian
@endsection
@section('content')
    <div class="col-md-12">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Validation Error!</strong> {{$error}}
                </div>
            @endforeach
        @endif
    </div>
    <div class="col-md-12">
        <div class="card shadow mb-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Register New Librarian</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="/librarians" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="fName">First Name: </label>
                            <input type="text" class="form-control form-control-user" name="fName" required value="{{old('fName')}}" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Last Name: </label>
                            <input type="text" class="form-control form-control-user" name="lName" required value="{{old('lName')}}" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Username: </label>
                            <input type="text" class="form-control form-control-user" name="username" required >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Password: (librarian123)</label>
                            <input type="password" class="form-control form-control-user" value="librarian123" name="password" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="gender">Gender:</label>
                            <select name="gender" required class="form-control form-control-user">
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="hidden" value="15" name="dpt">
                            <input type="hidden" value="1" name="role">
                            <input type="hidden" value="1" name="classs">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 justify-content-center">
                            <input type="submit" class="btn btn-outline-success btn-md" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection