<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\WindowController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requirement extends Model
{
    use HasFactory;

    public function window(){
        $this->belongsToMany(AppointmentController::class);
    }
}
