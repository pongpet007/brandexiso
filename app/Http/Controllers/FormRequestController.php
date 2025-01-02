<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormRequestController extends Controller
{
    public function index(Request $request)
    {

        $title = "Brandex ISO";
        $keyword = "";
        $description = "";

        return view("admin.pages.formrequest.form", compact('title', 'keyword', 'description'));
    }

    public function save(Request $request)
    {
        $request->validate(
            [
                'doc_name' => 'required',
                'doc_no' => 'required',
                'detail' => 'required'
            ],
            [
                'doc_name.required' => 'ชื่อเอกสาร ยังไม่ได้กรอก',
                'doc_no.required' => 'หมายเลขเอกสาร ยังไม่ได้กรอก',
                'detail.required' => 'รายละเอียด ยังไม่ได้กรอก'
            ]
        );

        $subject = $request->input("subject");
        $doc_name = $request->input("doc_name");
        $doc_no = $request->input("doc_no");
        $modify_from = $request->input("modify_from");
        $modify_to = $request->input("modify_to");
        $detail = $request->input("detail");
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;

        DB::table("form_request")->insert([
            'user_id'=>$user_id,
            'subject'=>$subject,
            'doc_name'=>$doc_name,
            'doc_no'=>$doc_no,
            'modify_from'=>$modify_from,
            'modify_to'=>$modify_to,            
            'detail'=>$detail,
            'date_approve'=>'',
            'date_allow_to_external'=>'',
            'cby'=>$name,
            'cdate'=>date('Y-m-d H:i:s'),
        ]);

        $request->session()->flash('status', 'ใบคำร้องถูกบันทึกเรียบร้อยแล้ว รอการอนุมัติ');

        return redirect("form-request");
    }
    
}
