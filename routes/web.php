<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\UserDocumentGroupController;
use App\Http\Controllers\DocumentAttachmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentGroupController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FormApproveController;
use App\Http\Controllers\FormRequestController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserControlController;
use App\Http\Controllers\HomeController;
use League\CommonMark\Node\Block\Document;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get(
//     '/theme',
//     function () {
//         return view("admin.theme");
//     }
// );

// Route::get('Category/destroy/{id}', [CategoryController::class, "destroy"]);
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/', [HomeController::class, "index"])->name('home');
    Route::resource('Department', DepartmentController::class);
    Route::resource('User', UserAdminController::class);
    Route::resource('UserControl', UserControlController::class);
    
    Route::resource('DocumentGroup', DocumentGroupController::class);
    Route::get('moveup/{group_id}',[DocumentGroupController::class,'up']);
    Route::get('movedown/{group_id}',[DocumentGroupController::class,'down']);

    Route::resource('UserDocumentGroup', UserDocumentGroupController::class);

    Route::resource('Document', DocumentController::class);
    Route::get("/documentlist/{group_id}", [DocumentController::class, "index"]);
    Route::get("/archivelist/{group_id}", [ArchiveController::class, "index"]);
    Route::get("/documentlist/create/{group_id}", function ($group_id) {
        $doc_id = DB::table('document')->insertGetId(
            [
                'doc_group_id' => $group_id,
                'cby' => Auth::user()->name,
                'cdate' => date('Y-m-d H:i:s'),
                'udate' => date('Y-m-d H:i:s')
            ]
        );
        return redirect("/Document/$doc_id/edit");
    });

    Route::post('Attachment/upload', [DocumentAttachmentController::class,"upload"])->name('upload');
    Route::get('downloadfile/{filepath}/{filename}', [DocumentAttachmentController::class,"download"])->name('download');
    Route::get('deleteFile/{attachment_id}',[DocumentAttachmentController::class,"deleteFile"])->name('deleteFile');
    Route::get('changeStatus/{attachment_id}',[DocumentAttachmentController::class,"changeStatus"]);
    Route::get('getpdf',[DocumentAttachmentController::class,"pdf"]);

    Route::get('form-request',[FormRequestController::class,'index']);
    Route::post('form-request-save',[FormRequestController::class,'save']);   

    Route::get('form-request-list/{is_approve}',[FormApproveController::class,'index']);
    Route::get('form-request-approve/{fr_id}',[FormApproveController::class,'approve']);
    Route::post('form-request-approve-save/{fr_id}',[FormApproveController::class,'approvesave']);
    Route::get('viewpdf/{fr_id}',[FormApproveController::class,'showpdf']);


    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
