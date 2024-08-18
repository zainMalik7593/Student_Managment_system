<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $primerykey = 'id';

    public function setNameAttribute($val) {
        $this->attributes['name'] = ucwords($val);
    }
    public function setFatherNameAttribute($val) {
        $this->attributes['father_name'] = ucwords($val);
    }
    public function setGenderAttribute($val) {
        $this->attributes['gender'] = ucwords($val);
    }
    public function setCourseAttribute($val) {
        $this->attributes['course'] = ucwords($val);
    }
}
