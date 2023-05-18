<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function execute(): View
    {
        return view('home', ['data' => null]);
    }

    public function execute_post(Request $request): View
    {
        $search = $request['search'];
        $url = 'https://www.googleapis.com/customsearch/v1?key=AIzaSyBMxyOcnbfqtzbTcbLXK6NK994CnT6mEcs&cx=700ba0602242244ab&q='.$search;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $results = json_decode($response, true);

        if (isset($results["items"])) {
            return view('home', ['data' => $results["items"]]);
        }
        return view('home', ['data' => "No results"]);
    }

}
