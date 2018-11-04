<?php

namespace IsGoms\Admin\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller{
    public function index()
    {
        return view('admin::index');
    }
}
