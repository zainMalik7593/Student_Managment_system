<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserved_seats extends Model
{
    use HasFactory;
    protected $table = 'reserved_seat';
    protected $primerykey = 'id';

    public function time(){
        return $this->hasOne('App\Models\timing','id','timeid');
    }
    public function class(){
        return $this->hasOne('App\Models\className','id','classid');
    }
    public function seat(){
        return $this->hasOne('App\Models\seat','id','seatid');
    }
}
