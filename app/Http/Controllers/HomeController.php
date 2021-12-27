<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $title = "Brandex ISO";
        $keyword = "";
        $description = "";

        $count_user = DB::table('users')->count();
        $count_department = DB::table('department')->count();
        $count_group = DB::table('document_group')->count();
        $count_document = DB::table('document')->count();


        return view('admin.pages.home', compact('title', 'keyword', 'description','count_user','count_department','count_group','count_document'));
    }
}
