<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentAttachmentController extends Controller
{

    public function deleteFile($attachment_id)
    {
        $attachment = DB::table("document_attachment")->where('attachment_id',$attachment_id)->get()->first();

        DB::table("document_attachment")
        ->where('attachment_id',$attachment_id)
        ->delete();

        Storage::delete($attachment->filepath);

        return redirect("Document/$attachment->doc_id/edit");
    }

    public function download($filepath,$filename)
    {
        // echo $filename;
        return response()->download(storage_path('app/attachment/' . $filepath),$filename);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'attachment' => 'required'
        ]);

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
                $filestatus = $request->input("filestatus");

                DB::table("document_attachment")->insert([
                    'doc_id' => $doc_id,
                    'filename' => $clientOriginalName,
                    'filepath' => $newFileName,
                    'filestatus' => $filestatus
                ]);

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
    public function changeStatus($attachment_id)
    {
        $attachment = DB::table("document_attachment")->where('attachment_id',$attachment_id)->get()->first();

        DB::table("document_attachment")
        ->where('attachment_id', $attachment_id)
        ->update([
            'filestatus' => $attachment->filestatus==1?2:1
        ]);

        return redirect("Document/$attachment->doc_id/edit");
    }
}
