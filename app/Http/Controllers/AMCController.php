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

    public function amc_edit($id, Request $request)
    {
        $data['getRecord'] = AMC::get_single($id);
        return view('admin.amc.edit', $data);
    }

    public function amc_update($id, Request $request)
    {

        $user = request()->validate([
            'name' => 'required|unique:amc,name,' . $id,
            'amount' => 'required',
        ]);

        $user = AMC::get_single($id);
        $user->name = trim($request->name);
        $user->amount = trim($request->amount);
        $user->business_category = trim($request->business_category);
        $user->series = trim($request->series);

        $user->save();
        return redirect('admin/amc/list')->with('success', 'Record Successfully Updated');
    }

    public function amc_delete($id, Request $request)
    {
        $delete_record = AMC::get_single($id);
        $delete_record->is_delete = 1;
        $delete_record->save();
        return redirect()->back()->with('error', 'Record successfully deleted!');
    }
}
