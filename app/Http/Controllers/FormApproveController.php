<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class FormApproveController extends Controller
{
    public function index(Request $request, $is_approve = 2)
    {
        $title = "Brandex ISO";
        $keyword = "";
        $description = "";

        $query = DB::table('form_request')
            ->leftJoin('users', 'users.id', '=', 'form_request.user_id')
            ->where('is_approve', $is_approve)
            ->orderBy('form_request.cdate', 'desc');

        $formrequests = $query->get();

        return view("admin.pages.formapprove.show", compact('title', 'keyword', 'description', 'formrequests', 'is_approve'));
    }

    public function approve(Request $request, $fr_id)
    {

        $title = "Brandex ISO";
        $keyword = "";
        $description = "";

        $formrequest = DB::table('form_request')
            ->leftJoin('users', 'users.id', '=', 'form_request.user_id')
            ->where('fr_id', $fr_id)->get()->first();

        return view("admin.pages.formapprove.form", compact('title', 'keyword', 'description', 'formrequest'));
    }

    public function approvesave(Request $request, $fr_id)
    {
        $is_approve = $request->input("is_approve");
        $date_approve = $request->input("date_approve");
        $is_allow_to_external = $request->input("is_allow_to_external");
        $date_allow_to_external = $request->input("date_allow_to_external");

        if ($is_approve == 1) {
            $request->validate(
                [
                    'is_approve' => 'required',
                    'date_approve' => 'required',
                ],
                [
                    'is_approve.required' => 'กรุณาเลือก อนุมัติ ผลกระทบกับเอกสารอื่น',
                    'date_approve.required' => 'วันที่เริ่มใช้ ยังไม่ได้กรอก',
                ]
            );
        } else {
            $request->validate(
                [
                    'is_approve' => 'required',
                ],
                [
                    'is_approve.required' => 'กรุณาเลือก อนุมัติ ผลกระทบกับเอกสารอื่น',
                ]
            );
        }

        // dd([
        //     'is_approve' => $is_approve,
        //     'date_approve' => $date_approve,
        //     'is_allow_to_external' => $is_allow_to_external,
        //     'date_allow_to_external' => $date_allow_to_external,
        // ]);

        DB::table("form_request")->where('fr_id', $fr_id)->update([
            'is_approve' => $is_approve,
            'date_approve' => $date_approve,
            'is_allow_to_external' => $is_allow_to_external,
            'date_allow_to_external' => $date_allow_to_external,
        ]);

        // $request->session()->flash('status', 'การพิจารณาถูกบันทึกเรียบร้อยแล้ว');

        return redirect("form-request-list/2");
    }


    public function showpdf(Request $request, $fr_id)
    {
        $formrequest = DB::table('form_request')
            ->leftJoin('users', 'users.id', '=', 'form_request.user_id')
            ->where('fr_id', $fr_id)->get()->first();
        $qmr = DB::table('users')->whereRaw(" upper(position)='QMR'")->get()->first();        
      

        $pdf = PDF::loadView('pdf.approve', compact('formrequest','qmr'));

        $pdf->getMpdf()->SetWatermarkText('เอกสารไม่ควบคุมสำเนา');
        $pdf->getMpdf()->showWatermarkText = true;
        
        return $pdf->stream('approve.pdf');

    }
}
