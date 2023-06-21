<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'finish_time',
        'comments',
        'user_id',
        'doctor_id',
    ];
 
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
 
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
