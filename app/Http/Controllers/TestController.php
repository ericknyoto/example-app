<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function index()
    {
        return view('upload-order');
    }
}
