<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('departments')->insert([
                ['name'=>'Librarian'],
            ['name'=>'Student'],
            ['name'=>'Teaching staff-Physics Department'],
            ['name'=>'Teaching staff-Chemistry Department'],
            ['name'=>'Teaching staff-Biology Department'],
            ['name'=>'Teaching staff-Literature Department'],
            ['name'=>'Teaching staff-Agriculture Department'],
            ['name'=>'Teaching staff-Mathematics Department'],
            ['name'=>'Teaching staff-Geography Department'],
            ['name'=>'Teaching staff-History Department'],
            ['name'=>'Teaching staff-Business Studies Department'],
            ['name'=>'Teaching staff-Home Economics Department'],
            ['name'=>'Teaching staff-Languages Department'],
            ['name'=>'Teaching staff-Technical Drawing Department'],
            ['name'=>'Teaching staff-Computing Department'],
            ['name'=>'Teaching staff-Religious Studies Department']]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_departments');
    }
}
