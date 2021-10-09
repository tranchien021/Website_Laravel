<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialCustomer extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table="table_social_customer";
    protected $fillable=[
        'provider_user_id',
        'provider_user_email',
        'provider',
        'user'
    ];
    protected $primaryKey='user_id';
    public function customer(){
        return $this->belongsTo('App\Models\Customer','user');
    }

}
