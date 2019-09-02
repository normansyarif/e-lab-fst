<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistribusiBahan extends Model
{
    protected $table = 'distribusi_bahan';

    public function bahan() {
    	return $this->belongsTo('App\Bahan', 'id_bahan');
    }
}
