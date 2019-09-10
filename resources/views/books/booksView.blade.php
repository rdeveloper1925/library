@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageHeader')
    Book : {{$book->title}}
@endsection
@section('content')
    <div class="col-md-12  container" style="padding: 13px;">
        <a href="/books" class="btn btn-md btn-success -pull-right"><span><i class="fa fa-backward"></i> </span> Go Back</a>
    </div>
    @if(Auth::user()->roles_id!=3)
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card shadow mb-12">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <a style="padding:0 13px 0 13px;width: 100%" href="/books/{{$book->id}}/edit" class="btn btn-warning btn-lg">Update Data</a>
                </div>
                <form id="{{$book->id}}" action="/books/{{$book->id}}" method="post">
                    @csrf
                    <input type="hidden" value="DELETE" name="_method"/>
                    <div class="form-group">
                        <button style="padding:0 13px 0 13px;width: 100%" onclick="areYou({{$book->id}})" class="btn btn-danger btn-lg">Delete</button>
                    </div>
                </form>
                <script>
                    function areYou(id){
                        if(confirm("Proceed with deletion?")){
                            document.getElementById(id).submit();
                            //window.location.href="/books/"+id;
                        }
                    }
                </script>
            </div>
        </div>
        @endif

    </div>
    <div class="col-md-9">
        <div class="card shadow mb-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><span><i class="fa fa-clipboard-list"></i> </span>{{$book->title}} by {{$book->author}}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fName">Title: </label>
                            <input type="text" disabled class="form-control form-control-user" name="fName" value="{{$book->title}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fName">Department: </label>
                            <input type="text" class="form-control form-control-user" value="{{$book->name}}" disabled >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Author: </label>
                            <input type="text" class="form-control form-control-user" name="lName" value="{{$book->author}}" disabled >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Subject: </label>
                            <input type="text" class="form-control form-control-user" value="{{$book->subject}}" disabled >
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