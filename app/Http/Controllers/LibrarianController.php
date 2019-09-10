<?php

namespace App\Http\Controllers;

use App\Departments;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=DB::table('users')->leftjoin('classes','users.classes_id','=','classes.id')
            ->where('users.roles_id','=',1)
            ->leftjoin('roles','users.roles_id','=','roles.id')
            ->select('users.id','users.fName','users.lName','classes.name as className','users.user_departments_id as dptName','users.gender','roles.name as roleName')->get();
        return view('librarians.librarians')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarians.librariansCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'fName'=>'required',
            'lName'=>'required',
            'gender'=>'required',
            'username'=>'required|unique:users',
            'dpt'=>'required|numeric',
            'role'=>'required|numeric',
            'password'=>'required'
        ];
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            $dpts=Departments::where('id','>','16')->get();
            return view('teachers.teachersCreate')->withErrors($validator)->with('dpts',$dpts)->with(Input::except('password'));
        }
        $user=new User();
        $user->fName=Input::get('fName');
        $user->lName=Input::get('lName');
        $user->gender=Input::get('gender');
        $user->username=Input::get('username');
        $user->classes_id=Input::get('classs');
        $user->roles_id=Input::get('role');
        $user->user_departments_id=Input::get('dpt');
        $user->password=Hash::make(Input::get('password'));
        $user->save();
        if($user){
            return redirect('/librarians')->with(['success'=>'Librarian Successfully Registered']);
        }else{
            return redirect ('/librarians')->with(['Fail'=>'A Db error occured']);
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
        $student=User::find($id);
        return view('librarians.librariansView')->with('student',$student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dpts=DB::table('departments')->get();
        $user_data=User::find($id);
        return view('teachers.teachersEdit')->with('user_data',$user_data)->with('dpts',$dpts);
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
        $rules= [
            'fName'=>'required',
            'lName'=>'required',
            'gender'=>'required',
            'username'=>'required',
            'dpt'=>'required|numeric',
            'role'=>'required|numeric'
        ];
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            $dpts=Departments::where('id','>','16')->get();
            return redirect('/teachers/'.$id.'/edit')->withErrors($validator)->with('dpts',$dpts)->with(Input::all());
        }
        $user=User::find($id);
        $user->fName=Input::get('fName');
        $user->lName=Input::get('lName');
        $user->gender=Input::get('gender');
        $user->username=Input::get('username');
        $user->classes_id=Input::get('classs');
        $user->roles_id=Input::get('role');
        $user->user_departments_id=Input::get('dpt');
        $user->save();
        return redirect('/librarian')->with(['success'=>'Librarian data successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->delete($id);
        return redirect('/librarians')->with(['success'=>'Librarian data successfully deleted']);
    }
}
