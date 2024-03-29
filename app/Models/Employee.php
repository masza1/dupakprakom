<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'nip',
        'name',
        'group_id',
        'position_id',
        'unit_id',
        'birthplace',
        'birthdate',
        'gender',
        'jenjang_pendidikan',
        'institusi',
        'no_karpeg',
        'tmt',
        'bulan_lama',
        'tahun_lama',
        'bulan_baru',
        'tahun_baru',
        'level_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function submissions(){
        return $this->hasMany(Submission::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
