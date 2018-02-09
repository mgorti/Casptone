<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecurityQuestionUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_question_users', function (Blueprint $table) {
            $table->increments('security_question_user_id');
            $table->integer('security_question_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('security_question_answer');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('security_question_users', function (Blueprint $table) {
            $table->foreign('security_question_id')->references('security_question_id')->on('security_question');
        });

        Schema::table('security_question_users', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::table('security_question_users')->insert(
            array(
                ['security_question_id' => 1,
                    'user_id' => 1,
                    'security_question_answer' => 'UNMC'],
                ['security_question_id' => 4,
                    'user_id' => 1,
                    'security_question_answer' => 'Texas'],
                ['security_question_id' => '5',
                    'user_id' => 1,
                    'security_question_answer' => 'Omaha']
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
        Schema::dropIfExists('security_question_users');
    }
}
