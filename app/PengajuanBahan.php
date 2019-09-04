<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanBahan extends Model
{
    protected $table = 'pengajuan_bahan';

    public function bahan() {
    	return $this->belongsTo('App\Bahan', 'id_bahan');
    }
}
