<?php

namespace App\Http\Controllers;


use App\Departments;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Image;

class PagesController extends Controller
{
    public function doLogin(){
        $rules = array(
            'username'    => 'required', // make sure the email is an actual email
            'password' => 'required|min:4' // password can only be alphanumeric and has to be greater than 3 characters
        );
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return redirect('/login')->withErrors($validator)->withInput(Input::except('password'));
        }else{
            $userdata = array(
                'username'     => Input::get('username'),
                'password'  => Input::get('password')
            );
            if($auth=Auth::attempt($userdata)){
                if(Auth::user()->roles_id==3){
                    return Redirect::to("/books");
                }
                return Redirect::to("/home");
            }else{
                return redirect('/login')->with(['authFail'=>"Check the username/password and try again"]);
            }
        }
    }

    public function profile(){
        $user=Auth::user();
        $profile=DB::table('users')->leftjoin('classes','users.classes_id','=','classes.id')
            ->where('users.id','=',$user->id)
            ->leftjoin('roles','users.roles_id','=','roles.id')
            ->select('users.id','users.fName','users.lName','classes.name as className','users.user_departments_id as dptName','users.gender','roles.name as roleName')->get();
        //$user->role=DB::table('roles')->select('name')->where('id','=',$user->id);
        return view('pages.profile')->with('profile',$profile[0]);
        //return Departments::find($profile[0]->dptName)->name;

    }

    public function doRegister(Request $request){
        $rules=array(
            'password'=>'required|min:4',
            'dob'=>'required',
            'passwordConfirm'=>'required|same:password',
            'fName'=>'required','lName'=>'required','address'=>'required','phone'=>'required|numeric','username'=>'required|unique:users','gender'=>'required'
        );
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return redirect("/register")->withErrors($validator)->withInput(Input::except('password'));
        }else{
            $pwd=Hash::make(Input::get('password'));
            $user=new User;
            $user->fName=Input::get('fName');
            $user->lName=Input::get('lName');
            $user->username=Input::get('username');
            $user->gender=Input::get('gender');
            $user->address=Input::get('address');
            $user->phone=Input::get('phone');
            $user->access_level=Input::get('accessLevel');
            $user->designation=Input::get('designation');
            $user->dob=Input::get('dob');
            $user->password=$pwd;
            $user->save();
            if($user){
                return Redirect::to('/login');
            }else{
                return "A db error occured";
            }
        }
    }

    public function doLogout(){
        Auth::logout();
        return Redirect::route('login');
    }

    public function test(){
        Storage::disk('local')->makeDirectory('/roman');
    }

    public function uploadDp(Request $request){
        $id=Auth::user()->id;
        $rules=['dp'=>'image|required|max:500'];
        $validator=Validator::make(Input::all(),$rules);

        if($validator->fails()){
            return Redirect::to('/profile')->withErrors($validator);
        }
        //unlink('img/dps/'.$id.'.jpg');
        DB::delete('delete from ProfilePicture where user_id=?',[$id]);

        $name=$id.".".$request->file('dp')->getClientOriginalExtension(); //23.jpg
        $request->file('dp')->move('img/dps/',$name);

        $db=DB::insert('insert into ProfilePicture (user_id,url,active) values (?,?,?)',[$id,"public/img/dps/".$name,true]);
        if($db){
            return Redirect::to('/profile')->with(['success'=>'Profile Picture Updated']);
        }else{
            return Redirect::to('/profile')->with(['success'=>'Profile Picture failed']);
        }
        /*if(!$disk->exists("/public/dp/".$id)){
            $disk->makeDirectory('/public/dp/'.$id);
        }
        $name=$id."-".time()."DP.".$request->file('dp')->getClientOriginalExtension();
        $path=$disk->putFileAs('/public/dp/'.$id,$request->file('dp'),$name);
        $db=DB::insert('insert into ProfilePicture (user_id,url,active) values (?,?,?)',[$id,$path,true]);

        */
    }

    public function showHome(){
        $users=DB::table('users')->count();
        $books=DB::table('books')->count();
        $students=DB::table('users')->where('roles_id','=',3)->count();
        $teachers=DB::table('users')->where('roles_id','=',2)->count();
        $librarians=DB::table('users')->where('roles_id','=',1)->count();
        return view('pages.home')->with('users',$users)
            ->with('books',$books)
            ->with('librarians',$librarians)
            ->with('students',$students)
            ->with('teachers',$teachers);
    }

}
