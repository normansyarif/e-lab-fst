<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlatMasuk extends Model
{
    protected $table = 'alat_masuk';

    public function user() {
    	return $this->belongsTo('App\Lokasi', 'id_user');
    }

    public function alat() {
    	return $this->belongsTo('App\Alat', 'id_alat');
    }
}
