<?php

namespace App\Http\Controllers;

use App\Books;
use App\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=DB::table('books')->leftJoin('departments','books.departments_id','=','departments.id')
        ->select(['books.id','books.title','books.subject','books.author','departments.name'])->get();
        return view('books.books')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=DB::table('departments')->where('name','NOT LIKE','Teaching%')
            ->where('name','!=','Librarian')
            ->where('name','!=','Student')->get();
        return view('books.booksCreate')->with('departments',$departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'title'=>'required',
            'author'=>'required',
            'subject'=>'required',
            'department'=>'required|numeric'
        ];
        $validator=Validator::make(Input::all(),$rules);
        if ($validator->fails()){
            return redirect('/books/create')->withErrors($validator)->withInput(Input::all());
        }
        $book=new Books();
        $book->title=Input::get('title');
        $book->author=Input::get('author');
        $book->subject=Input::get('subject');
        $book->departments_id=Input::get('department');
        $book->created_at=now();
        $book->save();
        if ($book){
            return redirect('/books')->with(['success'=>'Book has successfully been registered']);
        }else{
            return redirect('books/create')->with(['fail'=>'Failed to register book']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=DB::table('books')->leftJoin('departments','books.departments_id','=','departments.id')
            ->select(['books.id','books.title','books.subject','books.author','departments.name'])
            ->where('books.id','=',$id)->get();
        return view('books.booksView')->with('book',$book[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Books::find($id)->first();
        $departments=DB::table('departments')->where('name','NOT LIKE','Teaching%')
            ->where('name','!=','Librarian')
            ->where('name','!=','Student')->get();
        return view('books.booksEdit')->with('book',$book)->with('departments',$departments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'title'=>'required',
            'author'=>'required',
            'subject'=>'required',
            'department'=>'required|numeric'
        ];
        $validator=Validator::make(Input::all(),$rules);
        if ($validator->fails()){
            return redirect('/books/'.$id.'/edit')->withErrors($validator)->withInput(Input::all());
        }
        $book=Books::find($id);
        $book->title=Input::get('title');
        $book->author=Input::get('author');
        $book->subject=Input::get('subject');
        $book->departments_id=Input::get('department');
        $book->updated_at=now();
        $book->save();
        if ($book){
            return redirect('/books')->with(['success'=>'Book information has successfully been updated']);
        }else{
            return redirect('books/create')->with(['fail'=>'Failed to update book information']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('books')->delete($id);
        return redirect('/books')->with(['success'=>'Book information has successfully been Deleted']);
    }
}
