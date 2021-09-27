<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table="category_blog";
    protected $primaryKey="category_blog_id";
    protected $fillable=[
        'category_blog_name',
        'category_blog_status',
        'category_blog_slug',
        'category_blog_desc',
       
       
     
    ];
}
