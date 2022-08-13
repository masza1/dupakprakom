<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];

    public function getPostedDateAttribute(){
        return $this->created_at == null ? '-' : $this->created_at->diffForHumans();
    }
}
