<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Polyclinic;
use App\Models\Ticket;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'field',
        'poly_id',
        'office',
    ];

    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class, 'poly_id', 'id');
    }
}
