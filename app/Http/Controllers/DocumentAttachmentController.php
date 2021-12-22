<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentAttachmentController extends Controller
{
    public function download($filename)
    {
        // echo $filename;
        return response()->download(storage_path('app/attachment/'.$filename));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'attachment' => 'required'
        ]);
        // print_r($_FILES);
        // $part = pathinfo($_FILES['attachment']['name']);
        // $ext = $part['extension'];
        // $filename = date("YFd_his_").rand(1,5000);
        try {
            if ($request->file('attachment')->isValid()) {
              $path = $request->attachment->path();
              $extension = $request->attachment->extension();
              $clientOriginalName = $request->attachment->getClientOriginalName();
              $newFileName = time() . $clientOriginalName;
              $uploadedFile = $request->file('attachment');

              // Save File to local drive
              Storage::putFileAs('attachment', $uploadedFile, $newFileName);

              $doc_id = $request->input("doc_id");

              DB::table("document_attachment")->insert([
                    'doc_id'=>$doc_id,
                    'filename'=>$clientOriginalName,
                    'filepath'=>$newFileName
              ]) ;

              $return =  [
                'path' => $path,
                'extension' => $extension,
                'clientOriginalName' => $clientOriginalName,
                'newFileName' => $newFileName
              ];

              return redirect("Document/$doc_id/edit");

            }
          } catch (\Throwable $th) {
            return $th->getMessage();
          }


    }

}
