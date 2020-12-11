<?php
namespace App\Http\Controllers\Backend;

use App\Components\BackendController;

class AuthController extends BackendController
{
    public function index()
    {
        return view('backend.auth.login');
    }
}
