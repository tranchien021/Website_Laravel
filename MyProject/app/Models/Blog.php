<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table="blog";
    protected $primaryKey="blog_id";
    protected $fillable=[
        'blog_title',
        'blog_desc',
        'blog_content',
        'blog_meta_desc',
        'blog_meta_keywords',
        'blog_status',
        'blog_image',
        'category_blog_id',
        'blog_slug',
        'created_at',
        'time',
       
       
     
    ];
}
