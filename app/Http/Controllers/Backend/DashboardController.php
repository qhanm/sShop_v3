<?php
namespace App\Http\Controllers\Backend;

use App\Components\BackendController;

class DashboardController extends BackendController
{
    public function index()
    {
        return view('backend.dashboard.index');
    }
}