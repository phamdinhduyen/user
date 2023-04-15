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
            $table->string('fullname', 200)->nullable();
            $table->string('name', 200);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            // $table->increments('id'); //int, auto_increments, primary key
            $table->integer('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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