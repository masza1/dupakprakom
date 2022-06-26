<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['level_id', 'position_name'];
    public $timestamps = false;

    public function level(){
        return $this->belongsTo(Level::class);
    }
}
