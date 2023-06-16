<?php

namespace App\Services\Polyclinics;

use DB;

class ContactsService
{
    public function phoneNumber() {
        $number=[];

        $datas = DB::table('polyclinics')
            ->pluck('contacts')
            ->toArray();
        
        foreach ($datas as $data) {
            $number[] = "+".substr($data, 0, 3)."(".substr($data, 3, 2).") ".substr($data, 5, 3)." ".substr($data, 8, 2)." ".substr($data, 10, 2);
        }
        
        return $number;
    }
}