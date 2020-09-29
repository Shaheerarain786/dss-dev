<?php


namespace App\Services;


use App\Zone;

class ZoneService
{
    public function ajax_delete_zones($request)
    {
        dd($request->zones);

        if(Zone::whereIn('id',$request->zones)->delete()){
            return true;
        }
        else
        {
            return false;
        }

    }
}
