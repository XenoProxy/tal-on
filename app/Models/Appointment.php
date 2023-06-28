<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Doctor;
use App\Models\User;

class Appointment extends Model
{
    use HasFactory;
    protected $table = "appointments";

    protected $fillable = [
        'start_time',
        'finish_time',
        'comments',
        'user_id',
        'doctor_id',
    ];
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
}
