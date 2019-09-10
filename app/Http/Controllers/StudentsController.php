<?php

namespace App\Http\Controllers;

use App\Classes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=DB::table('users')->leftjoin('classes','users.classes_id','=','classes.id')
            ->where('users.roles_id','=',3)
            ->leftjoin('roles','users.roles_id','=','roles.id')
            ->select('users.id','users.fName','users.lName','classes.name as className','users.user_departments_id as dptName','users.gender','roles.name as roleName')->get();
        return view('pages.students')->with('users',$users);
        //return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes=Classes::where('id','!=','1')->get();
        return view('pages.studentsCreate')->with('classes',$classes);
    }

    public function view($id){
        $student=User::find($id);
        return view('pages.studentsView')->with('student',$student);
        //return  $student;
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
            'classs'=>'required|numeric',
            'role'=>'required|numeric',
            'password'=>'required',
            'department'=>'required|numeric'
        ];
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            $classes=Classes::where('id','!=','1')->get();
            return view('pages.studentsCreate')->withErrors($validator)->with('classes',$classes)->with(Input::except('password'));
        }

        $user=new User();
        $user->fName=Input::get('fName');
        $user->lName=Input::get('lName');
        $user->gender=Input::get('gender');
        $user->username=Input::get('username');
        $user->classes_id=Input::get('classs');
        $user->roles_id=Input::get('role');
        $user->user_departments_id=Input::get('department');
        $user->password=Hash::make(Input::get('password'));
        $user->save();
        if($user){
            $users=DB::table('users')->leftjoin('classes','users.classes_id','=','classes.id')
                ->where('users.roles_id','=',3)
                ->leftjoin('roles','users.roles_id','=','roles.id')
                ->select('users.id','users.fName','users.lName','classes.name as className','users.user_departments_id as dptName','users.gender','roles.name as roleName')->get();
            return redirect('/students')->with('users',$users)->with(['success'=>Input::get('fName').' '.Input::get("lName").' successfully registered']);
        }else{
            return redirect('/students/create')->with('fail','A Db error occurred');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_array=DB::table('users')->where('id','=',$id)->get();
        $classes=Classes::where('id','!=','1')->get();
        $user_data=$user_array[0];
        //return $user_data->fName;
        return view('pages.studentsEdit')->with('user_data',$user_data)->with('classes',$classes);
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
        $user=User::find($id);
        $rules= [
            'fName'=>'required',
            'lName'=>'required',
            'gender'=>'required',
            'username'=>'required',
            'classs'=>'required|numeric',
            'role'=>'required|numeric',
            'department'=>'required|numeric'
        ];
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            $classes=Classes::where('id','!=','1')->get();
            return redirect('/students/'.$id.'/edit')->withErrors($validator)->with('classes',$classes)->with(Input::except('password'));
        }
        $user->fName=Input::get('fName');
        $user->lName=Input::get('lName');
        $user->gender=Input::get('gender');
        $user->username=Input::get('username');
        $user->classes_id=Input::get('classs');
        $user->roles_id=Input::get('role');
        $user->user_departments_id=Input::get('department');
        $user->save();
        return redirect('/students/'.$id.'/view')->with(['success'=>'User details Edited successfully']);
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
        $users=DB::table('users')->leftjoin('classes','users.classes_id','=','classes.id')
            ->where('users.roles_id','=',3)
            ->leftjoin('roles','users.roles_id','=','roles.id')
            ->select('users.id','users.fName','users.lName','classes.name as className','users.user_departments_id as dptName','users.gender','roles.name as roleName')->get();
        return redirect('/students')->with(["success"=>'User successfully deleted!']);
    }

    public function pwdReset($id){
        $user=User::find($id);
        $user->password=Hash::make('student123');
        $fName=$user->fName;
        $user->save();
        return \redirect('/students')->with(['success'=>$fName."'s password successfully changed to student123"]);
    }

}
