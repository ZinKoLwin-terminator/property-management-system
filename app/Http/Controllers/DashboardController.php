<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard(Request $request)
    {
        echo "admin";
        die();
    }

    public function user_dashboard(Request $request)
    {
        echo "user";
        die();
    }

    public function vendor_dashboard(Request $request)
    {
        echo "vendor";
        die();
    }
}
