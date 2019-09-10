<?php

class UserTableSeeder extends \Illuminate\Database\Seeder{
    public function run(){
        \Illuminate\Support\Facades\DB::table('users')->delete();
        \App\User::create([
            'fName'=>"Administrator",
            'lName'=>"Admin",
            'gender'=>"male",
            'username'=>"admin",
            'password'=>\Illuminate\Support\Facades\Hash::make('Arbromanore1'),
            'email'=>"admin@schoolmaster.com",
            'dob'=>'1997-06-09'
        ]);
    }
}