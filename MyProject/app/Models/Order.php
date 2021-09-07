<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table="order";
    protected $primaryKey="order_id";
    protected $fillable=[
        'customer_id',
        'shipping_id',
        'order_status',
        'order_code',
        'created_at'
       
    ];
    public $timestamps=false;

   
    
}
