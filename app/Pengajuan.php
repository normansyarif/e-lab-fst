<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    public function pengaju() {
    	return $this->belongsTo('App\Lokasi', 'id_pengaju');
    }

    public function teraju() {
    	return $this->belongsTo('App\Lokasi', 'id_teraju');
    }

    public function alats() {
    	return $this->hasMany('App\PengajuanAlat', 'id_pengajuan');
    }

    public function bahans() {
    	return $this->hasMany('App\PengajuanBahan', 'id_pengajuan');
    }
}
