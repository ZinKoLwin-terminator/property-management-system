<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AMCController extends Controller
{
    public function amc_list(Request $request)
    {
        return view('admin.amc.list');
    }
}
