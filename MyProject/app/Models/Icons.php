<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'icon_name',
        'icon_image',
        'icon_link',
        'category'
       
        
    ];
    protected $primaryKey="icon_id";
    protected $table ="icons";
}
