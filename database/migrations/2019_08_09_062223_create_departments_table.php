<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('departments')->insert([
            ['name'=>'Physics Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Chemistry Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Biology Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Literature Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Agriculture Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Mathematics Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Geography Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'History Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Business Studies Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Home Economics Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Languages Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Technical Drawing Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Computing Department','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Religious Studies Department','created_at'=>now(),'updated_at'=>now()]]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
