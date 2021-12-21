<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentGroupController extends Controller
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

        // $xx = DB::table('document_group')->where("parent_id", 0)->get();
        // $documentgroups = array();
        // foreach ($xx as $key => $value) {
        //     $documentgroups[$key]["main"] = $value;
        //     $sub1s =  DB::table('document_group')->where("parent_id", $value->doc_group_id)->get();
        //     $documentgroups[$key]["sub"] = array($sub1s);

        //     foreach ($sub1s as $key2 => $value2) {
        //         $sub2s = DB::table('document_group')->where("parent_id", $value2->doc_group_id)->get();
        //         $documentgroups[$key]["sub"][$key2]["sub2"] = array($sub2s);
        //     }
        // }
        $documentgroups = DB::table('document_group')->where("parent_id", 0)->get();
        foreach ($documentgroups as $value) {
            $value->sub = DB::table('document_group')->where("parent_id", $value->doc_group_id)->get();
            foreach ( $value->sub as $value2) {
                $value2->sub2 = DB::table('document_group')->where("parent_id", $value2->doc_group_id)->get();
            }
        }
        return view("admin.pages.documentgroup.show", compact('title', 'keyword', 'description', 'documentgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = "Add";
        $xx =  DB::table('document_group')->where("parent_id", 0)->pluck('group_name', 'doc_group_id');

        $maingroups = array();
        foreach ($xx as $key => $value) {
            $maingroups[$key] = array($value);
            $maingroups[$key]["sub"] = DB::table('document_group')->where("parent_id", $key)->pluck('group_name', 'doc_group_id');
        }

        return view('admin.pages.documentgroup.form', compact('method', 'maingroups'));
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
            'group_name' => 'required'
        ]);

        $group_name = $request->input("group_name");
        $parent_id = $request->input("parent_id");
        DB::table("document_group")->insert([
            'group_name' => $group_name,
            'parent_id' => $parent_id
        ]);
        return redirect("DocumentGroup");
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
        $documentgroup = DB::table("document_group")->where('doc_group_id', $id)->first();

        $method = "Edit";
        $xx =  DB::table('document_group')->where("parent_id", 0)->pluck('group_name', 'doc_group_id');

        $maingroups = array();
        foreach ($xx as $key => $value) {
            $maingroups[$key] = array($value);
            $maingroups[$key]["sub"] = DB::table('document_group')->where("parent_id", $key)->pluck('group_name', 'doc_group_id');
        }

        return view('admin.pages.documentgroup.form', compact('method', 'documentgroup', 'maingroups'));
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
            'group_name' => 'required'
        ]);

        $group_name = $request->input("group_name");
        $parent_id = $request->input("parent_id");
        DB::table("document_group")
            ->where('doc_group_id', $id)
            ->update([
                'group_name' => $group_name,
                'parent_id' => $parent_id
            ]);
        return redirect("DocumentGroup");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("document_group")
            ->where('doc_group_id', $id)
            ->delete();
        return redirect("DocumentGroup");
    }
}
