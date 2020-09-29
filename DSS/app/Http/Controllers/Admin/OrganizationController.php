<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrgnizationRequest;
use App\Organization;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrganizationController extends Controller
{
     public function __construct()
     {
         //do something
     }

    public function index()
    {
        $organizations = Organization::with('zones')->get();

        $zones = Zone::all();

        return view('admin.organizations.index', compact('organizations','zones'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, OrgnizationRequest $orgnizationRequest)
    {
        $org = Organization::create($request->all());

        return redirect('organization')->with('success', 'Organization created Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $organization = Organization::findOrFail($id);

        return view('admin.organizations.edit',compact('organization'));
    }


    public function update(Request $request, $id)
    {
        $org = Organization::findOrFail($id);

        $org->update($request->all());

        return redirect('organization')->with('Organization updated successfully');
    }


    public function destroy($id)
    {
        Organization::findOrFail($id)->delete();

        return back()->with('success','Organization deleted successfully');
    }

    public function assign_org(Request $request){

        $organizationId = $request->organization_id;
        $zoneIds = $request->zone_id;

        foreach($zoneIds as $zoneId){
            Zone::where('id',$zoneId)->update([
                'organization_id' => $organizationId
            ]);
        }

        return redirect('organization')->with('success','Succsess');
    }
}
