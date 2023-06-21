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
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
 
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}