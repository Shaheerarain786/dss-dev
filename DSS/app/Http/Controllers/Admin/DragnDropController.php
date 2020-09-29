<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DragnDropController extends Controller
{
    public function index() {
        return view('admin.device_templates.drag_and_drop');
    }
}
