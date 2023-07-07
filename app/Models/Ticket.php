<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Polyclinic;

class Ticket extends Model
{
    use HasFactory;

    protected $table = "tickets";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class);
    }
}
