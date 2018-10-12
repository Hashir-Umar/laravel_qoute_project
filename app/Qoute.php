<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qoute extends Model
{
    public function author() {
        return $this->belongsTo('App\Author');
    }
}
