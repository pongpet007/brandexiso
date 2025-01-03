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
    public function index(Request $request)
    {
        $title = "Brandex ISO";
        $keyword = "";
        $description = "";

        $parent_id = $request->input("parent_id");

        if ($parent_id == "") {
            $documentgroups = DB::table('document_group')->where("parent_id", 0)->orderBy('position', 'asc')->get();
            foreach ($documentgroups as $value) {
                $value->sub = DB::table('document_group')->where("parent_id", $value->doc_group_id)->orderBy('position', 'asc')->get();
                foreach ($value->sub as $value2) {
                    $value2->sub2 = DB::table('document_group')->where("parent_id", $value2->doc_group_id)->orderBy('position', 'asc')->get();
                }
            }
        }
        else{
            $documentgroups = DB::table('document_group')->where("parent_id", $parent_id)->orderBy('position', 'asc')->get();
            foreach ($documentgroups as $value) {
                $value->sub  = [];
            }
        }

        // dd($documentgroups);

        return view("admin.pages.documentgroup.show", compact('title', 'keyword', 'description', 'documentgroups', "parent_id"));
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

        $doc_group_id = DB::getPdo()->lastInsertId();
        DB::table('document_group')->where('doc_group_id', $doc_group_id)->update(['position' => $doc_group_id]);

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

    public function up($doc_group_id)
    {

        $group_current = DB::table("document_group")
            ->where('doc_group_id', $doc_group_id)->get()->first();
        // dd($group_current);

        $group_replace = DB::table("document_group")
            ->where('parent_id', $group_current->parent_id)
            ->where('position', '<', $group_current->position)
            ->orderBy('position', 'desc')
            ->get()->first();

        if ($group_replace == null) {
            return redirect("DocumentGroup?parent_id=".$group_current->parent_id);
        }
        // dd($group_current,$group_replace);

        DB::table("document_group")
            ->where('doc_group_id', $doc_group_id)->update(['position' => $group_replace->position]);

        DB::table("document_group")
            ->where('doc_group_id', $group_replace->doc_group_id)->update(['position' => $group_current->position]);

        return redirect("DocumentGroup?parent_id=".$group_current->parent_id);
    }

    public function down($doc_group_id)
    {
        $group_current = DB::table("document_group")
            ->where('doc_group_id', $doc_group_id)->get()->first();
        // dd($group_current);

        $group_replace = DB::table("document_group")
            ->where('parent_id', $group_current->parent_id)
            ->where('position', '>', $group_current->position)
            ->orderBy('position', 'asc')
            ->get()->first();

        if ($group_replace == null) {
            return redirect("DocumentGroup?parent_id=".$group_current->parent_id);
        }
        // dd($group_current,$group_replace);

        DB::table("document_group")
            ->where('doc_group_id', $doc_group_id)->update(['position' => $group_replace->position]);

        DB::table("document_group")
            ->where('doc_group_id', $group_replace->doc_group_id)->update(['position' => $group_current->position]);

        return redirect("DocumentGroup?parent_id=".$group_current->parent_id);
    }
}
