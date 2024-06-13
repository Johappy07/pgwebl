<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $data = [
            "title" => " Jakarta Metropolitan RailMap",
        ];

        if (auth()->check()) {
            return view('index', $data);
        } else {
            return view('landing', $data);
        }
    }

    public function map()
    {
        $data = [
            "title" => " Jakarta Metropolitan RailMap ",
        ];

        if (auth()->check()) {
            return view('index', $data);
        } else {
            return view('index-public', $data);
        }
    }

    public function table()
    {
        $data = [
            "title" => "Table",
        ];
        return view('table', $data);
    }

    public function landing()
    {
        $data = [
            "title" => "Landing",
        ];
        return view('landing', $data);
    }

    public function indexPublic()
    {
        $data = [
            "title" => " Jakarta Metropolitan RailMap",
        ];
        return view('index-public', $data);
    }
}
