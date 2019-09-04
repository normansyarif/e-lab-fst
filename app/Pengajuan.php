<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    public function pengaju() {
    	return $this->belongsTo('App\User', 'id_pengaju');
    }

    public function teraju() {
    	return $this->belongsTo('App\User', 'id_teraju');
    }
}
