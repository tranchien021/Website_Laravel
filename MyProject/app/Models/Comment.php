<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'comment_name',
        'comment_product_id',
        'comment',
        'comment_date',
        'comment_staus',
        'comment_parent'
        
    ];
    protected $primaryKey="comment_id";
    protected $table ="comment";
    public function products(){
        return $this->belongsTo('App\Models\Product','comment_product_id');
    }
}
