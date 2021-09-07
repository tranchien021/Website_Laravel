<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneyship extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'mship_matp',
        'mship_maqh',
        'mship_xaid',
        'mship_money'
        
    ];
    protected $primaryKey="mship_id";
    protected $table ="money_ship";

    public function city(){
        return $this->belongsTo('App\Models\City','mship_matp');
    }
    public function province(){
        return $this->belongsTo('App\Models\Province','mship_maqh');
    }
    public function wards(){
        return $this->belongsTo('App\Models\Wards','mship_xaid');
    }
}

