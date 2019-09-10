@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageHeader')
    Books
@endsection
@section('content')
    @if(Auth::user()->roles_id!=3)
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="/books/create" class="btn btn-sm btn-success"><span style="padding-right: 10px"><i class="fa fa-plus-square"></i> </span>Create New Book</a>
    </div>
    @endif
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
    <div class="card shadow mb-4 col-md-12" style="padding: 0 0;">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Books</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Subject</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->subject}}</td>
                            <td>{{$book->name}}</td>
                            <td><a href="/books/{{$book->id}}" class="btn btn-success btn-sm">View</a>
                                @if(Auth::user()->roles_id!=3)
                                <a href="/books/{{$book->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form id="{{$book->id}}" action="/books/{{$book->id}}" method="post">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method"/>
                                    <button onclick="areYou({{$book->id}})" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Subject</th>
                        <th>Department</th>
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
                            //window.location.href="/librarians/"+id;
                        }else{

                        }
                    }
                </script>
            </div>
        </div>
    </div>
@endsection