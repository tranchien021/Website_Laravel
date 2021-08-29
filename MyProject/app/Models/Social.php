<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table="table_social";
    protected $fillable=[
        'provider_user_id',
        'provider',
        'user'
    ];
    protected $primaryKey='user_id';


}
