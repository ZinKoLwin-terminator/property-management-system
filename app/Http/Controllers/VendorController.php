<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorType;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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

    public function vendor_store(Request $request)
    {

        // @dd($request->all());
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'status' => 'required',
            'category_id' => 'required',
            'vendor_type_id' => 'required',
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->last_name        = trim($request->last_name);
        $user->email            = trim($request->email);
        $user->mobile           = trim($request->mobile);

        if (!empty($request->file('profile'))) {
            $file = $request->file('profile');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/profile/', $filename);
            $user->profile = $filename;
        }

        // $user->address          = trim($request->address);
        $user->vendor_type_id   = trim($request->vendor_type_id);
        $user->company_name     = trim($request->company_name);
        $user->employee_id      = trim($request->employee_id);
        $user->category_id      = trim($request->category_id);
        $user->always_assign    = trim($request->always_assign);
        $user->status           = trim($request->status);
        $user->is_admin         = 2;
        $user->remember_token       = Str::random(50);
        $user->forgot_token         = Str::random(50);
        $user->save();

        return redirect('admin/vendor/list')->with('success', 'Record successfully created!');
    }
}