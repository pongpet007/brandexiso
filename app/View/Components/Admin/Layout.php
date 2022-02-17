<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getGroup()
    {
        $documentgroups = DB::table('document_group')
            ->join('user_document_group', 'document_group.doc_group_id', '=', 'user_document_group.doc_group_id')
            ->where('user_document_group.user_id', Auth::user()->id)
            ->where("parent_id", 0)
            ->orderBy('group_name', 'asc')
            ->get();
        foreach ($documentgroups as $value) {
            $value->ct = DB::table('document')->where('doc_group_id', $value->doc_group_id)->where('version_id', 1)->count();
            $value->sub = DB::table('document_group')->where("parent_id", $value->doc_group_id)->get();
            foreach ($value->sub as $value2) {
                $value2->ct = DB::table('document')->where('doc_group_id', $value2->doc_group_id)->where('version_id', 1)->count();
                $value2->sub2 = DB::table('document_group')->where("parent_id", $value2->doc_group_id)->get();
                foreach ($value2->sub2 as $value3) {
                    $value3->ct = DB::table('document')->where('doc_group_id', $value3->doc_group_id)->where('version_id', 1)->count();
                }
            }
        }
        // dd($documentgroups);
        return $documentgroups;
    }

    public function getGroup2()
    {
        $documentgroups = DB::table('document_group')
            ->join('user_document_group', 'document_group.doc_group_id', '=', 'user_document_group.doc_group_id')
            ->where('user_document_group.user_id', Auth::user()->id)
            ->where("parent_id", 0)
            ->orderBy('group_name', 'asc')
            ->get();
        foreach ($documentgroups as $value) {
            $value->ct = DB::table('document')->where('doc_group_id', $value->doc_group_id)->where('version_id', 2)->count();
            $value->sub = DB::table('document_group')->where("parent_id", $value->doc_group_id)->get();
            foreach ($value->sub as $value2) {
                $value2->ct = DB::table('document')->where('doc_group_id', $value2->doc_group_id)->where('version_id', 2)->count();
                $value2->sub2 = DB::table('document_group')->where("parent_id", $value2->doc_group_id)->get();
                foreach ($value2->sub2 as $value3) {
                    $value3->ct = DB::table('document')->where('doc_group_id', $value3->doc_group_id)->where('version_id', 2)->count();
                }
            }
        }
        // dd($documentgroups);
        return $documentgroups;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menugroups = $this->getGroup();
        $menugroups2 = $this->getGroup2();
        return view('admin.layout.major', compact('menugroups','menugroups2'));
    }
}
