<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "student"; 
    protected $primaryKey = "studentId";
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }

    public function program(){
        return $this->belongsTo(Program::class,'programid','id');
    }
}
