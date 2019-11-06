<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public function lokasi() {
        return $this->belongsTo('App\Lokasi', 'lokasi_id');
    }
}
