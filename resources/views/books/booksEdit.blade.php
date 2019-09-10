@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageHeader')
    Update Book Information
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
                <h6 class="m-0 font-weight-bold text-primary">Update Book Information</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="/books/{{$book->id}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method"/>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="fName">Title: </label>
                            <input type="text" class="form-control form-control-user" name="title" required value="{{$book->title}}" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Author: </label>
                            <input type="text" class="form-control form-control-user" name="author" required value="{{$book->author}}" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Subject: </label>
                            <input type="text" class="form-control form-control-user" name="subject" required value="{{$book->subject}}" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fName">Department: </label>
                            <select required class="form-control-user form-control" name="department">
                                @foreach($departments as $dpt)
                                    <option value="{{$dpt->id}}">{{$dpt->name}}</option>
                                @endforeach
                            </select>
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