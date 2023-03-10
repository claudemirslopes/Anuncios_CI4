<?php

namespace App\Controllers\Manager;

use App\Controllers\BaseController;

class ManagerController extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Dashboard'
        ];
        return view('Manager/Home/index', $data);
    }
}
