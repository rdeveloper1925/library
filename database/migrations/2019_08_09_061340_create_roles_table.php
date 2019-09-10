<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        $librarianRole=array('name'=>'librarian','created_at'=>now(),'updated_at'=>now());
        $teacherRole=array('name'=>'teacher','created_at'=>now(),'updated_at'=>now());
        $studentRole=array('name'=>'student','created_at'=>now(),'updated_at'=>now());
        DB::table('roles')->insert($librarianRole);
        DB::table('roles')->insert($teacherRole);
        DB::table('roles')->insert($studentRole);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
