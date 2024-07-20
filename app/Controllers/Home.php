<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        session();
        $data = [
            'title' => 'Form Pendaftaran',
            'validation' => \Config\Services::validation()
        ];
        return view('register_platek', $data);
    }
}
