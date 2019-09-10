<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('classes')->insert([
            ['name'=>'N/A','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Senior 1','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Senior 2','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Senior 3','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Senior 4','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Senior 5','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Senior 6','created_at'=>now(),'updated_at'=>now()]]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
