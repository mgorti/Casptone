<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecurityQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_question', function (Blueprint $table) {
            $table->increments('security_question_id');
            $table->string('security_question')->unique();
            $table->boolean('archived')->default(0);
            $table->timestamps();
        });

        //Inserting security questions
        DB::table('security_question')->insert([
            [
                'security_question' => 'Your first employer'
            ],
            [
                'security_question' => 'Your mother maiden name'
            ],
            [
                'security_question' => 'Your first car'
            ],
            [
                'security_question' => 'State where you lived at the age of 5'
            ],
            [
                'security_question' => 'Your favourite city'
            ],
            [
                'security_question' => 'Your School best friend name'
            ],
            [
                'security_question' => 'Your favourite holiday destination'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_question');
    }
}
