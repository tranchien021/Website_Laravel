<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table="roles";
    protected $primaryKey="id_roles";
    protected $fillable=[
        'name',
       
     
    ];



    public function admin(){
        return $this->belongsToMany('App\Models\Account');
    }

}
