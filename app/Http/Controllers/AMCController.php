<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AMC;

use App\Models\AmcAddOns;

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

    public function amc_add_ons_list($id, Request $request)
    {
        $data['getRecord'] = AMC::get_single($id);
        $data['get_add_ons'] = AmcAddOns::get_add_ons($id);
        return view('admin.amc.add_ons_list', $data);
    }

    public function amc_add_add_ons($id, Request $request)
    {
        $data['getRecord'] = AMC::get_single($id);
        // @dd($data['getRecord']);
        return view('admin.amc.add_ons_add', $data);
    }

    public function amc_store__add_ons(Request $request)
    {
        // @dd($request->all());
        $insert_r = request()->validate([
            'amc_id' => 'required',
            'name' => 'required',
            'price' => 'required'
        ]);

        $insert_r = new AmcAddOns;
        $insert_r->amc_id = trim($request->amc_id);
        $insert_r->name = trim($request->name);
        $insert_r->price = !empty($request->price) ? $request->price : '0';
        $insert_r->save();

        return redirect('admin/amc/add_ons/' . $request->amc_id)->with('success', 'Record Successfully Created');
    }
}
