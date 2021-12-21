<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($group_id)
    {
        $title = "Brandex ISO";
        $keyword = "";
        $description = "";

        $group = DB::table('document_group')->where('doc_group_id', $group_id)->get()->first();

        $documents = DB::table('document')->where('doc_group_id', $group_id)->get();

        return view("admin.pages.document.show", compact('title', 'keyword', 'description', 'group', 'group_id', 'documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group_id)
    {

        $method = "Add";
        $group = DB::table('document_group')->where('doc_group_id', $group_id)->get()->first();

        return view('admin.pages.document.form', compact('method', 'group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'doc_code' => 'required',
        //     'doc_date' => 'required',
        //     'title' => 'required'
        // ]);

        // $group_name = $request->input("group_name");

        // DB::table("document_group")->insert([
        //     'group_name' => $group_name,

        // ]);
        // return redirect("DocumentGroup");
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
        $document =  DB::table('document')->where('doc_id', $id)->get()->first();
        $group = DB::table('document_group')->where('doc_group_id', $document->doc_id)->get()->first();

        $method = "Edit";

        return view('admin.pages.document.form', compact('method', 'document', 'group'));
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
            'doc_code' => 'required',
            'doc_date' => 'required',
            'title' => 'required'
        ]);

        $doc_code = $request->input("doc_code");
        $doc_date = $request->input("doc_date");
        $title = $request->input("title");
        $detail = $request->input("detail");
        $remark = $request->input("remark");

        DB::table("document")
            ->where('doc_id', $id)
            ->update([
                'doc_code' => $doc_code,
                'doc_date' => $doc_date,
                'title' => $title,
                'detail' => $detail,
                'remark' => $remark,

            ]);
        // echo $id;
        $document = DB::table("document")->where('doc_id', $id)->get()->first();
        return redirect("documentlist/$document->doc_group_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("document")
            ->where('doc_id', $id)
            ->delete();

        $document = DB::table("document")->where('doc_id', $id)->get()->first();
        return redirect("documentlist/$document->doc_group_id");
    }
}
