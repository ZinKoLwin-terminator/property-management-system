<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorType;
use App\Models\Category;

class VendorController extends Controller
{
    public function vendor_list(Request $request)
    {
        return view('admin.vendor.list');
    }

    public function vendor_add(Request $request)
    {
        $data['getVendorType'] = VendorType::get_record($request);
        $data['getCategory'] = Category::get_record($request);
        return view('admin.vendor.add', $data);
    }
}
