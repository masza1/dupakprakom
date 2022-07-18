<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenActivity extends Model
{
    protected $guarded = [];

    public function sub_element()
    {
        return $this->belongsTo(SubElement::class);
    }

    public function element()
    {
        return $this->belongsTo(Element::class);
    }
}
