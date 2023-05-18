<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LogoutController extends Controller
{
    public function execute(): View
    {
        return view('login');
    }
}
