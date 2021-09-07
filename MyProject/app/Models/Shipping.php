<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table="shipping";
    protected $primaryKey="shipping_id";
    public $timestamps=false;
    protected $fillable=[
        'shipping_name',
        'shipping_address',
        'shipping_phone',
        'shipping_email',
        'shipping_notes',
        'shipping_method'
    ];
    
}
