<?php   

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table= 'appointment';

    public function guest()
    {
        return $this->belongsTo(Guest::class,'guestid','id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'scheduleid','id',);
    }

    public function student()
    {   

        return $this->belongsTo(Student::class,'studentid','studentId');
    }

    public function time()
    {
        return $this->belongsTo(Time::class,'timeid','id');
    }

    public function window()
    {
        return $this->belongsTo(Window::class);
    }


    public function wind(){
        return $this->belongsTo(Window::class,'windowid','id');
    }
    public function times(){
        return $this->belongsTo(Time::class,'timeid','id');
    }

    public function sched(){
        return $this->belongsTo(Schedule::class,'scheduleid','id');
    }

    public function status(){
        return $this->belongsTo(Status::class,'appointment_id','id');
    }
    public function guests(){
        return $this->belongsTo(Guest::class,'guestid','id');

    }
    public function students(){
        return $this->belongsTo(Student::class,'studentid','studentId');

    }
   
}
