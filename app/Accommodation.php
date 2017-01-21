<?php

namespace App;

use App\Room;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $guarded = ['id'];

    public function rooms()
    {
      return $this->hasMany('App\Room');
    }
}
