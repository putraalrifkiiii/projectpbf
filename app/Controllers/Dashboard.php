<?php

namespace App\Controllers;

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
