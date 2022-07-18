<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function sub_element(){
        return $this->belongsTo(SubElement::class);
    }

    public function element(){
        return $this->belongsTo(Element::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }
}
