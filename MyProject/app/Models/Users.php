<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notification;

class Users extends Authenticatable
{
    
    use HasFactory;
    public $table="users";
    protected $primaryKey="id";
    protected $fillable=[
        'name',
        'email',
        'password',
        'level',
        'phone'
       
    ];
    public $timestamps=false;


    public function roles(){
        return $this->belongsToMany('App\Models\Roles');
    }
    public function getAuthPassword(){
        return $this->password;
    }
    
    public function hasAnyRole($roles){
        return null!== $this->roles()->whereIn('name',$roles)->first();
    }
    public function hasRole($role){
        return null!== $this->roles()->where('name',$role)->first();
    }
}
