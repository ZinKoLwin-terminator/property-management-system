<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AMC;

class AMCController extends Controller
{
    public function amc_list(Request $request)
    {
        // @dd($request);
        $data['getRecord'] = AMC::get_record($request);
        return view('admin.amc.list', $data);
    }

    public function amc_add(Request $request)
    {
        return view('admin.amc.add');
    }

    public function amc_insert(Request $request)
    {
        // dd($request->all());

        $user = request()->validate([
            'name' => 'required|unique:amc',
            'amount' => 'required',
        ]);

        $user = new AMC;
        $user->name = trim($request->name);
        $user->amount = trim($request->amount);
        $user->business_category = trim($request->business_category);
        $user->series = trim($request->series);

        $user->save();
        return redirect('admin/amc/list')->with('success', 'Record Successfully Created');
    }
}