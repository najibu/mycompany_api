<?php

namespace App;

use App\Accommodation;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    public function accommodation()
    {
      $this->belongsTo('App\Accommodation');
    }
}
