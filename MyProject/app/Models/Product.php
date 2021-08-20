<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table="sanpham";
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
    	'tinhtrang'

    ];
    public function cat(){
    	return $this->hasOne(Category::class,'theloai','masp');
    }
}
