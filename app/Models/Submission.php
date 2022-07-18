<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $guarded = [];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function detail_activities(){
        return $this->hasMany(DetailActivity::class);
    }

    public function detail_pen_activities(){
        return $this->hasMany(DetailPenActivity::class);
    }
}
