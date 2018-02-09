<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use app\department;

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
            $table->increments('id');
            $table->string('password',60);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('contactno')->nullable();
            $table->string('role');
            $table->integer('department_id')->nullable();
            $table->boolean('archived')->default(0);
           $table->integer('created_by')->unsigned()->nullable();
           $table->integer('updated_by')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        //Adding foreign key constraint with EmailidRole table
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('email')->references('email')->on('EmailIdRole');
        });

        //Adding foreign key constraints with Department table
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('department_id')->references('department_id')->on('department');
        });


        //Inserting record for admin
        DB::table('users')->insert(
            array(
                'email' => 'admin@wechart.com',
                'password' => Hash::make('wechartadmin'),
                'firstname' => 'Thanh',
                'lastname' => 'Nguyen',
                'role' => 'Admin'
                )
            );
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
