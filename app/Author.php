<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    public function qoute() {
        return $this->hasMany('App\Qoute');
    }
}
