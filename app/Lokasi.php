<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';

    public function rekap() {
    	return $this->hasMany('App\Rekap', 'lokasi_id');
    }
}
