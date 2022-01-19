<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserDocumentGroupController extends Controller
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

        $doc_group_id = $request->query('doc_group_id');

        $users_groups = array();
        if($doc_group_id>0){
            $rows = DB::table('user_document_group')->where('doc_group_id',$doc_group_id)->get();
            foreach($rows as $row){
                $users_groups[$row->user_id] = $row->user_id;
            }
        }

        $documentgroups = DB::table('document_group')->where("parent_id", 0)->orderBy('group_name','asc')->get();
        foreach ($documentgroups as $value) {
            $value->sub = DB::table('document_group')->where("parent_id", $value->doc_group_id)->orderBy('group_name','asc')->get();
            foreach ( $value->sub as $value2) {
                $value2->sub2 = DB::table('document_group')->where("parent_id", $value2->doc_group_id)->orderBy('group_name','asc')->get();
            }
        }


        $users = DB::table('users')->get();


        return view("admin.pages.usercontrol.show", compact('title', 'keyword', 'description', 'documentgroups','users','users_groups','doc_group_id'));
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
            'user_id' => 'required'
        ]);

        $doc_group_id = $request->input("doc_group_id");
        $user_ids = $request->input("user_id");

        DB::table("user_document_group")
        ->where('doc_group_id', $doc_group_id)
        ->delete();

        foreach($user_ids as $user_id){
            DB::table("user_document_group")->insert([
                'doc_group_id' => $doc_group_id,
                'user_id'=> $user_id,
                'cdate'=>date('Y-m-d H:i:s'),
                'cby'=>Auth::user()->name
            ]);
        }

        return redirect("UserDocumentGroup?doc_group_id=$doc_group_id");
    }



}
