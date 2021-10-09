<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table="visitors";
    protected $primaryKey="id_visitors";
    protected $fillable=[
        'ip_address',
        'date_visitors',
    ];
}
