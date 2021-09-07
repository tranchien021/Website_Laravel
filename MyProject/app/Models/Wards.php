<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'name_xaphuong',
        'type',
        'maqh'
        
    ];
    protected $primaryKey="xaid";
    protected $table ="table_xaphuongthitran";
}
