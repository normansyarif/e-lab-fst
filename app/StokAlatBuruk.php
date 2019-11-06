<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokAlatBuruk extends Model
{
    protected $table = 'stok_alat_buruk';

    public function stok() {
    	return $this->belongsTo('App\StokAlat', 'stok_id');
    }
}
