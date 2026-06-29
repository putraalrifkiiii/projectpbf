<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Midtrans extends BaseConfig
{
    public $serverKey;
    public $clientKey;
    public $isProduction = false;

    public function __construct()
    {
        // Mengisi nilai variabel di dalam constructor
        $this->serverKey = env('MIDTRANS_SERVER_KEY');
        $this->clientKey = env('MIDTRANS_CLIENT_KEY');
        $this->isProduction = false;
    }
}
