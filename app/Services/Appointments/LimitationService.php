<?php

namespace App\Services\Appointments;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LimitationService
{
    public function appointmentLimit($doctor_id) : bool
    {
        $isOrdered = false;

        $datas = DB::table('appointments')
            ->where('user_id', Auth::id())
            ->where('doctor_id', $doctor_id)
            ->pluck('id')
            ->toArray();
        if(count($datas) >= 1){
            $isOrdered = true;
        }

        return $isOrdered;
    }
}