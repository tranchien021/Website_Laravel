<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $table="customer";
    protected $primaryKey="customer_id";
    protected $fillable=[
        'customer_name',
        'customer_email',
        'customer_password',
        'customer_phone',
        'customer_vip',
        'customer_token',
        'customer_picture'
       
    ];
    public $timestamps=false;
}
