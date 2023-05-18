<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function sign(Request $request)
    {
        if (!empty($request['email']) && !empty($request['password'])) {


            // 3.raw. Check that user has already existed
            $user = DB::table('users')->where('email', $request['email'])->where('password', $request['password']);

            if ($user->exists()) {
                return view('admin');
            }
        }
        return view('login');
    }
}
