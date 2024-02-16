<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorType;

class VendorTypeController extends Controller
{
    public function vendor_type_list(Request $request)
    {
        $data['getRecord'] = VendorType::get_record($request);
        return view('admin.vendor_type.list', $data);
    }

    public function vendor_type_add(Request $request)
    {

        return view('admin.vendor_type.add');
    }

    public function vendor_type_store(Request $request)
    {
        // @dd($request->all());

        $save = request()->validate([
            'name' => 'required|unique:vendor_type',
        ]);
        $save = new VendorType;
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin/vendor_type/list')->with('success', 'Record Successfully Created!');
    }

    public function vendor_type_edit($id)
    {

        $data['getRecord'] = VendorType::get_single($id);
        return view('admin.vendor_type.edit', $data);
    }

    public function vendor_type_update($id, Request $request)
    {
        // @dd($request->all());
        $update = request()->validate([
            'name' => 'required|unique:vendor_type,name,' . $id,
        ]);
        $update = VendorType::get_single($id);
        $update->name = trim($request->name);
        $update->save();

        return redirect('admin/vendor_type/list')->with('success', 'Record Successfully Updated!');
    }

    public function vendor_type_delete($id)
    {
        $delete = VendorType::get_single($id);
        $delete->is_delete = 1;
        $delete->save();

        return redirect('admin/vendor_type/list')->with('success', 'Record Successfully Deleted!');
    }
}
