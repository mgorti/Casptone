<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'password','contactno','role','departmentName','archived'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function EmailidRole() {
        return $this->belongsTo('App\EmailidRole');
    }
    public function department() {
        return $this->belongsTo('App\department');
    }
    public function users_patient() {
        return $this->belongsTo('App\users_patient');
    }
    public function patient() {
        return $this->belongsToMany('App\patient', 'created_by');
    }

    protected $table = 'users';
    protected $primaryKey = 'id';
}