<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

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
        $documentgroups = DB::table('document_group')->where("parent_id", 0)->get();
        foreach ($documentgroups as $value) {
            $value->sub = DB::table('document_group')->where("parent_id", $value->doc_group_id)->get();
            foreach ($value->sub as $value2) {
                $value2->sub2 = DB::table('document_group')->where("parent_id", $value2->doc_group_id)->get();
            }
        }
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
        return view('admin.layout.major', compact('menugroups'));
    }
}
