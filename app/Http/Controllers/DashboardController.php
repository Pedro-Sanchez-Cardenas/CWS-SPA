<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Dashboard - Analytics
    public function index()
    {
        if ((Auth::user()->getRoleNames()[0] == 'Super-Admin') || (Auth::user()->getRoleNames()[0] == 'Director') || (Auth::user()->getRoleNames()[0] == 'Operations-Manager') || (Auth::user()->getRoleNames()[0] == 'Administrative-Manager')) {

            $pageConfigs = ['pageHeader' => false];
            return view('/content/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
        } else if (Auth::user()->getRoleNames()->first() == 'Manager') {

            $pageConfigs = ['pageHeader' => false];
            return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
        } else if (Auth::user()->getRoleNames()->first() == 'Operator') {

            $pageConfigs = ['pageHeader' => false];
            return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
        }
    }

    // Dashboard - Ecommerce
    public function dashboardEcommerce()
    {
    }
}
