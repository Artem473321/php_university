<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function execute(): View
    {

        if (empty($_SESSION['auth'])) {
            header('Location: /');
            die;
        }

        $arguments = [];
        return view('welcome');
    }
}
