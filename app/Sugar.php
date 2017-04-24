<?php

namespace OE;

use Illuminate\Database\Eloquent\Model;

class Sugar extends Model
{
    public function patient() {
		return $this->belongsTo('App\User');
	}
}
