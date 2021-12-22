<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Brandex ISO";
        $keyword = "";
        $description = "";
        $departments = DB::table('department')->get();

        return view("admin.pages.department.show", compact('title', 'keyword', 'description', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = "Add";
        return view('admin.pages.department.form', compact('method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dep_name' => 'required'
        ]);

        $dep_name = $request->input("dep_name");
        DB::table("department")->insert([
            'dep_name' => $dep_name
        ]);
        return redirect("Department");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $department = DB::table("department")->where('dep_id', $id)->first();

        $method = "Edit";
        return view('admin.pages.department.form', compact('method', 'department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'dep_name' => 'required'
        ]);

        $dep_name = $request->input("dep_name");

        DB::table("department")
            ->where('dep_id', $id)
            ->update([
                'dep_name' => $dep_name
            ]);
        return redirect("Department");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("department")
            ->where('dep_id', $id)
            ->delete();
        return redirect("Department");
    }
}
