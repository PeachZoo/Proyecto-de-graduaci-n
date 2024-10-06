<?php

namespace App\Controllers;

class PersonalizarController extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function registro(): string
    {
        return view('registro');
    }
}