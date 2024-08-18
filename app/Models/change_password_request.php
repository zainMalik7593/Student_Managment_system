<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class change_password_request extends Model
{
    use HasFactory;
    protected $table = 'changepassword_request';
    protected $primarykey = 'id';
}
