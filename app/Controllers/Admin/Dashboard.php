<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Toko Elektronik'
        ];
        return view('dashboard/index', $data);
    }
}
