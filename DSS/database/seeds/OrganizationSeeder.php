<?php

use App\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizationName = ['DIB Bank', 'Shahrjah Economic Bank','Emirates NBD'];

        foreach($organizationName as $org)
        {
            $organization = new Organization();
            $organization->name = $org;
            $organization->save();
        }
    }
}
