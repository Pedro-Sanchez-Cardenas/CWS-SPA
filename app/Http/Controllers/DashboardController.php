<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Dashboard - Analytics
    public function index()
    {
        if ((Auth::user()->getRoleNames()->first() == 'Super-Admin') || (Auth::user()->getRoleNames()->first() == 'Director') || (Auth::user()->getRoleNames()->first() == 'Operations-Manager') || (Auth::user()->getRoleNames()->first() == 'Administrative-Manager')) {

            $pageConfigs = ['pageHeader' => false];
            return view('/content/dashboard/dashboard-administrative', ['pageConfigs' => $pageConfigs]);
        } else if (Auth::user()->getRoleNames()->first() == 'Manager') {

            $pageConfigs = ['pageHeader' => false];
            return view('/content/dashboard/dashboard-operation', ['pageConfigs' => $pageConfigs]);
        } else if (Auth::user()->getRoleNames()->first() == 'Operator') {

            $pageConfigs = ['pageHeader' => false];
            return view('/content/dashboard/dashboard-operation', ['pageConfigs' => $pageConfigs]);
        }
    }

    // Dashboard - Ecommerce
    public function dashboardEcommerce()
    {
    }
}
