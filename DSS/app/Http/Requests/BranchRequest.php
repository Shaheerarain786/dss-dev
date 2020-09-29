<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'branch_name'               => 'required',
            'branch_manager_name'       => 'required',
            'branch_code'               => 'required',
            'branch_contact_no'         => 'required',
            'branch_it_support_name'    => 'required',
            'branch_it_support_no'      => 'required'
        ];
    }
}
