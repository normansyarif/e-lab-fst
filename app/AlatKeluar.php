<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlatKeluar extends Model
{
    protected $table = 'alat_keluar';

    public function alat() {
    	return $this->belongsTo('App\Alat', 'id_alat');
    }

    public function tujuan() {
    	return $this->belongsTo('App\User', 'id_tujuan');
    }
}
