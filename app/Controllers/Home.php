<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Form Pendaftaran'
    ];
        return view('order', $data);
    }
    public function success(): string
    {
        $data = [
            'title' => 'Form Pendaftaran'
    ];
        return view('success', $data);
    }
}
