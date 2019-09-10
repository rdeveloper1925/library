<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('fName');
            $table->string('lName');
            $table->string('gender');
            $table->bigInteger('classes_id')->unsigned();
            $table->bigInteger('roles_id')->unsigned();
            $table->bigInteger('user_departments_id')->unsigned();
            $table->string('password');
            $table->timestamps();

        });
        $root=[
            'username'=>'root',
            'fName'=>'Administrator',
            'lName'=>'Admin',
            'gender'=>'male',
            'classes_id'=>1,
            'roles_id'=>1,
            'user_departments_id'=>1,
            'password'=>\Illuminate\Support\Facades\Hash::make('admin12345678')
        ];
        \Illuminate\Support\Facades\DB::table('users')->insert($root);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
