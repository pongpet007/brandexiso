<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $title = "Brandex ISO";
        $keyword = "";
        $description = "";
        return view('admin.pages.home', compact('title', 'keyword', 'description'));
    }
}
