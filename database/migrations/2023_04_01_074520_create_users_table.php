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
            $table->integer('status');
            
            // $table->text('description')->nullable(); //text
            $table->timestamps();
            $table->foreignId('country_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->on('countrys');
            $table->foreignId('group_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->on('groups');
           
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