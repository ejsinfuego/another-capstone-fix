<?php

namespace App\Models;

use App\Models\Requirement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Window extends Model
{
    use HasFactory;
    protected $table = "window";
  
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }

    public function requirements(){
        return $this->hasMany(Requirement::class);
    }
   
}
