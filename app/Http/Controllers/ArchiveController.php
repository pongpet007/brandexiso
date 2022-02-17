<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
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
            ->where('version_id', 2)
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

        $yearsearch = DB::table('document_year')->select('year')->distinct()->orderBy('year', 'desc')->get();
        // dd($yearsearch);

        return view("admin.pages.archive.show", compact('title', 'keyword', 'description', 'group', 'group_id', 'documents', 'keyword', 'year', 'yearsearch'));
    }


}
