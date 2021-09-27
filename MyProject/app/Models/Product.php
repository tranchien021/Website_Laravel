<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table="sanpham";
	public $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
    	'content',
    	'price',
    	'theloai',
    	'date',
    	'address',
    	'name',
    	'img',
    	'masp',
    	'tinhtrang',
		'quantity',
		'product_id',
		'product_sold',
		'order_detail_id',
		'product_tag',
	

    ];
    public function cat(){
    	return $this->hasOne(Category::class,'theloai','masp');
    }
	public function comment(){
		return $this->belongsToMany('App\Models\Comment');
	}
}
