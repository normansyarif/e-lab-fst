<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanAlat extends Model
{
    protected $table = 'pengajuan_alat';

    public function alat() {
    	return $this->belongsTo('App\Alat', 'id_alat');
    }
}
