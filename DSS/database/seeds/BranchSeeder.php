<?php

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = ['Shahrjah','Dubai','AbuDhabi','Ras Al Khaimah'];
        $branchCodes = ['SRJ-1001','DXB-1002','AD-1003','RAK-1004'];
        $branchManagersName = [
            'Mohammad Shaheer',
            'Uzair Ayub',
            'Wajid Abbas',
            'Mohammad Basit'
        ];
        $branchContectNo = ['565939434','565939434','565939434','565939434'];
        $branchITSupportName = [
            'Mohammad Shaheer',
            'Uzair Ayub',
            'Wajid Abbas',
            'Mohammad Basit'
        ];
        $branchITSupportNo = ['565939434','565939434','565939434','565939434'];

        foreach ($branches as $key => $branch)
        {
            $b = new \App\Branch();
            $b->branch_name = $branch;
            $b->branch_code = $branchCodes[$key];
            $b->branch_manager_name = $branchManagersName[$key];
            $b->branch_contact_no = $branchContectNo[$key];
            $b->branch_it_support_name = $branchITSupportName[$key];
            $b->branch_it_support_no = $branchITSupportNo[$key];
            $b->save();
        }
    }
}
