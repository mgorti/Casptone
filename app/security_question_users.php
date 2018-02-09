<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class security_question_users extends Model
{
    protected $searchableColumns = ['security_question_user_id'];
    protected $fillable = [
        'security_question_id','security_question_answer','user_id','created_by','updated_by'
    ];

    public function security_questions() {
        return $this->hasMany('App\security_question');
    }

    public function users() {
        return $this->hasMany('App\User');
    }

    protected $table = "security_question_users";
    protected $primaryKey ='security_question_id';
    //
}
