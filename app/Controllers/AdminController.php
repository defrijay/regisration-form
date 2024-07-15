<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Merchandise'
        ];
        return view('Admin/admin', $data);
    }
}
