<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubElement extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function element(){
        return $this->belongsTo(Element::class);
    }
}
