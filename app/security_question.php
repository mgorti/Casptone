<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class security_question extends Model
{
    use Eloquence;
    protected $searchableColumns = ['security_question'];
    protected $fillable = [
        'security_question','archived','created_by','updated_by'
    ];



    protected $table = "security_question";
    protected $primaryKey ='security_question_id';
    //
}
