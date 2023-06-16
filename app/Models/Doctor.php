<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Polyclinic;

class Doctor extends Model
{
    use HasFactory;

    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class, 'poly_id', 'id');
    }
}
