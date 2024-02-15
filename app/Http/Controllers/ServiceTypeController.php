<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ServiceType;

class ServiceTypeController extends Controller
{
    public function service_type_list(Request $request)
    {
        $data['getRecord'] = ServiceType::get_record($request);
        return view('admin.service_type.list', $data);
    }

    public function service_type_add(Request $request)
    {

        return view('admin.service_type.add');
    }

    public function service_type_add_post(Request $request)
    {
        // @dd($request->all());
        $save = request()->validate([
            'name' => 'required|unique:service_type',
        ]);
        $save = new ServiceType;
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin/service_type/list')->with('success', 'Record Successfully Created!');
    }

    public function service_type_edit($id, Request $request)
    {
        $data['getRecord'] = ServiceType::get_single($id);
        return view('admin.service_type.edit', $data);
    }

    public function service_type_edit_update($id, Request $request)
    {
        // @dd($request->all());
        $save = request()->validate([
            'name' => 'required|unique:service_type,name,' . $id,
        ]);

        $update = ServiceType::get_single($id);
        $update->name = trim($request->name);
        $update->save();
        return redirect('admin/service_type/list')->with('success', 'Record Successfully Updated!');
    }

    public function service_type_delete($id, Request $request)
    {
        $deleteRecord = ServiceType::get_single($id);
        $deleteRecord->is_delete = 1;
        $deleteRecord->save();

        return redirect('admin/service_type/list')->with('success', 'Record Successfully deleted!');
    }
}