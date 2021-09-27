<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table="brand_product";
    protected $primaryKey="brand_id";
    protected $fillable=[
        'brand_name',
        'slug_brand',
        'meta_keywords',
        'brand_desc',
        'brand_parent',
        'brand_status',
        'brand_order'
       
     
    ];
}
