<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class department extends Model
{

    protected $searchableColumns = ['department_name'];
    protected $fillable = [
        'department_name','archived','created_by','updated_by'
    ];

    public function users() {
        return $this->hasMany('App\User');
    }

    protected $table = 'department';
    protected $primaryKey ='department_id';
    //
}
