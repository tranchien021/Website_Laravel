<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="theloai";
    protected $fillable=['Tên','theloai','meta_keywords','meta_desc'];
    public $timestamps=false;
    public function products(){
    	return $this->hasMany(Product::class,'masp','theloai');
    }
}
