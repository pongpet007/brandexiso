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
    public function index(Request $request, $group_id)
    {
        $title = "Brandex ISO";
        $keyword = "";
        $description = "";

        $keyword = $request->input('keyword');
        $year = $request->input('year');

        $group = DB::table('document_group')->where('doc_group_id', $group_id)->get()->first();

        $query = DB::table('document')
            ->leftJoin('document_year','document.doc_id','=','document_year.doc_id')
            ->select('document.*')
            ->where('doc_group_id', $group_id)
            ->where('version_id', 1)
            ->whereRaw("( doc_date like '%$keyword%' or doc_code like '%$keyword%' or  rev like '%$keyword%' or  title like '%$keyword%') ")
            ;
        if($year>0){
            $query->where('document_year.year',$year);
        }

        $documents = $query->distinct()->get();

        foreach ($documents as $document) {
            $document->attachments = DB::table('document_attachment')->where('doc_id', $document->doc_id)->get();
            $document->years =  DB::table('document_year')->where('doc_id', $document->doc_id)->get();
        }
        $yearsearch = DB::table('document_year')->select('year')->distinct()->orderBy('year','desc')->get();
        // dd($yearsearch);

        return view("admin.pages.document.show", compact('title', 'keyword', 'description', 'group', 'group_id', 'documents', 'keyword', 'year', 'yearsearch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group_id)
    {

        $method = "Add";
        $documentgroups = DB::table('document_group')->where("parent_id", 0)->get();
        foreach ($documentgroups as $value) {
            $value->sub = DB::table('document_group')->where("parent_id", $value->doc_group_id)->get();
            foreach ($value->sub as $value2) {
                $value2->sub2 = DB::table('document_group')->where("parent_id", $value2->doc_group_id)->get();
            }
        }
        $group = DB::table('document_group')->where('doc_group_id', $group_id)->get()->first();

        return view('admin.pages.document.form', compact('method', 'group', 'documentgroups'));
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
        $documentgroups = DB::table('document_group')->where("parent_id", 0)->get();
        foreach ($documentgroups as $value) {
            $value->sub = DB::table('document_group')->where("parent_id", $value->doc_group_id)->get();
            foreach ($value->sub as $value2) {
                $value2->sub2 = DB::table('document_group')->where("parent_id", $value2->doc_group_id)->get();
            }
        }
        $years = array();
        for ($i = date('Y') + 1; $i >= 2021; $i--) {
            $years[$i] = $i;
        }

        $document =  DB::table('document')->where('doc_id', $id)->get()->first();
        $group = DB::table('document_group')->where('doc_group_id', $document->doc_id)->get()->first();
        $attachments = DB::table('document_attachment')->where('doc_id', $id)->get();
        $document_years = DB::table('document_year')->where('doc_id', $id)->get();
        $yearchecked = array();
        foreach ($document_years as $y) {
            $yearchecked[] = $y->year;
        }
        // dd($yearchecked);
        $method = "Edit";

        return view('admin.pages.document.form', compact('method', 'document', 'group', 'attachments', 'documentgroups', 'years', 'yearchecked'));
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
            'rev' => 'required',
            'doc_date' => 'required',
            'title' => 'required'
        ]);

        $year = $request->input("year");
        $version_id = $request->input("version_id");
        $doc_group_id = $request->input("doc_group_id");
        $doc_code = $request->input("doc_code");
        $rev = $request->input("rev");
        $doc_date = $request->input("doc_date");
        $title = $request->input("title");
        $detail = $request->input("detail");
        $remark = $request->input("remark");

        DB::table("document")
            ->where('doc_id', $id)
            ->update([
                'version_id' => $version_id,
                'doc_group_id' => $doc_group_id,
                'doc_code' => $doc_code,
                'rev' => $rev,
                'doc_date' => $doc_date,
                'title' => $title,
                'detail' => $detail,
                'remark' => $remark,
            ]);

        if (is_array($year) && sizeof($year) > 0) {
            DB::table("document_year")
                ->where('doc_id', $id)
                ->delete();

            foreach ($year as $y) {
                DB::table("document_year")->insert([
                    'doc_id' => $id,
                    'year' => $y
                ]);
            }
        }

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
        $document = DB::table("document")->where('doc_id', $id)->get()->first();
        DB::table("document")
            ->where('doc_id', $id)
            ->delete();
        return redirect("documentlist/$document->doc_group_id");
    }
}
