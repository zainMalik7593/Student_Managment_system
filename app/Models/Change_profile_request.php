<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Change_profile_request extends Model
{
    use HasFactory;
    protected $table = 'change_profile_request';
    protected $primarykey = 'id';
}
