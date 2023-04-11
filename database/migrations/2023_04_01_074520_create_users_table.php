<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->increments('id'); //int, auto_increments, primary key
            $table->string('fullname', 200); //varchar;
            $table->string('email')->unique();
            $table->bigInteger('group_id')->unsigned();
            $table->integer('status');
            $table->bigInteger('country_id')->unsigned();
            // $table->text('description')->nullable(); //text
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('country_id');
            $table->dropColumn('group_id');
        } );
    }
};