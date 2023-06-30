<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\User;

class Polyclinic extends Model
{
    use HasFactory;

    public function doctor()
    {
        return $this->hasMany(Doctor::class, 'poly_id', 'id');
    }
}
