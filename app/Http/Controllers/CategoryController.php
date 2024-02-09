<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list(Request $request)
    {
        $data['getRecord'] = Category::get_record($request);
        return view('admin.category.list', $data);
    }

    public function category_add(Request $request)
    {
        return view('admin.category.add');
    }

    public function category_insert(Request $request)
    {
        // @dd($request->all());
        $save = request()->validate([
            'name' => 'required|unique:category',
        ]);
        $save = new Category;
        $save->name = trim($request->name);
        $save->save();
        return redirect('admin/category/list')->with('success', 'Record Successfully Created!');
    }

    public function category_edit($id, Request $request)
    {
        $data['getRecord'] = Category::get_single($id);
        return view('admin.category.edit', $data);
    }

    public function category_update($id, Request $request)
    {
        // @dd($request->all());
        $save = request()->validate([
            'name' => 'required|unique:category,name,' . $id,
        ]);
        $save = Category::get_single($id);
        $save->name = trim($request->name);
        $save->save();
        return redirect('admin/category/list')->with('success', 'Record Successfully Updated!');
    }

    public function category_delete($id, Request $request)
    {
        $delete_record = Category::get_single($id);
        $delete_record->is_delete = 1;
        $delete_record->save();
        return redirect('admin/category/list')->with('success', 'Record Successfully Deleted!');
    }
}
