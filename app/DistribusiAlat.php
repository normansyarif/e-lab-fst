<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistribusiAlat extends Model
{
    protected $table = 'distribusi_alat';

    public function alat() {
    	return $this->belongsTo('App\Alat', 'id_alat');
    }
}
