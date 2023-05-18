<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GuestbookController extends Controller
{

    public function execute(Request $request): View
    {

        // TODO 1: PREPARING ENVIRONMENT: 1) session 2) functions
//        session_start();

// TODO 2: ROUTING

// TODO 3.raw: CODE by REQUEST METHODS (ACTIONS) GET, POST, etc. (handle data from request): 1) validate 2) working with data source 3.raw) transforming data

// 1. Create empty $infoMessage
        $infoMessage = '';

// 2. handle form data
        if (!empty($request['name']) && !empty($request['email']) && !empty($request['text'])) {

            // 3. Prepare data
            $aComment = $_POST;
            DB::table('comments')->insert(
                    array(
                        'email' => $request['email'],
                        'name' => $request['name'],
                        'text' => $request['text']
                    )
                );

        } elseif (!empty($_POST)) {
            $infoMessage = 'Заполните поля формы!';
        }
        $elements = DB::table('comments')->get();

        return view('guestbook', ['data' => $elements]);
    }
}
