<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Form Pendaftaran'
        ];
        return view('register_platek', $data);
    }
}
