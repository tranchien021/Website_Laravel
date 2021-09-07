<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $table="order_detail";
    protected $primaryKey="order_detail_id";
    protected $fillable=[
        'order_code',
        'product_id',
        'id',
        'product_name',
        'product_price',
        'product_sale_quantity',
        'product_coupon',
        'product_moneyship'
    ];
    public $timestamps=false;
    public function product(){
        return $this->belongsTo('App\Models\Product','id');
    }
   
}
