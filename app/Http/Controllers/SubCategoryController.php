<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function sub_category_list(Request $request)
    {
        $data['getRecord'] = SubCategory::get_record($request);
        return view('admin.sub_category.list', $data);
    }

    public function sub_category_add(Request $request)
    {
        $data['getCategory'] = Category::get_record($request);
        return view('admin.sub_category.add', $data);
    }

    public function sub_category_store(Request $request)
    {
        $store = request()->validate([
            'category_id' => 'required',
            'name' => 'required'
        ]);

        $store = new SubCategory;
        $store->category_id = trim($request->category_id);
        $store->name = trim($request->name);
        $store->save();

        return redirect('admin/sub_category/list')->with('success', 'Sub Category Successfully created!');
    }

    public function sub_category_edit($id, Request $request)
    {
        $data['getCategory'] = Category::get_record($request);
        $data['getRecord'] = SubCategory::get_single($id);
        return view('admin.sub_category.edit', $data);
    }

    public function sub_category_update($id, Request $request)
    {
        // @dd($request->all());
        $update = request()->validate([
            'category_id' => 'required',
            'name' => 'required'
        ]);

        $update = SubCategory::get_single($id);
        $update->category_id = trim($request->category_id);
        $update->name = trim($request->name);
        $update->save();

        return redirect('admin/sub_category/list')->with('success', 'Sub Category Successfully updated!');
    }

    public function sub_category_delete($id)
    {
        $delete = SubCategory::get_single($id);
        $delete->is_delete = 1;
        $delete->save();
        return redirect('admin/sub_category/list')->with('success', 'Sub Category Successfully delete!');
    }
}
