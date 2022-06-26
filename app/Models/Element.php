<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function sub_selements(){
        return $this->hasMany(SubElement::class);
    }
}
