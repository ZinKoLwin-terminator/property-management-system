<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function sub_category_list()
    {
        return view('admin.sub_category.list');
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
}
