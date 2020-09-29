<?php

use App\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zonesName = ['Dubai','Abu Dhabi','Shahrjah','Ajman','Um Al Quyoon','Fujera','RAK'];

        foreach($zonesName as $zone)
        {
            $z = new Zone();
            $z->name = $zone;
            $z->save();
        }
    }
}
