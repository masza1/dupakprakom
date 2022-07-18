<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenActivity extends Model
{
    protected $guarded = [];

    public function pen_activity()
    {
        return $this->belongsTo(PenActivity::class);
    }

    public function activity()
    {
        return $this->belongsTo(PenActivity::class, 'pen_activity_id');
    }
}
