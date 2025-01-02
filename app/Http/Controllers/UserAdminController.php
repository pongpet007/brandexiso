<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserAdminController extends Controller
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

        $users = DB::table('users')
            ->leftJoin('department', 'users.dep_id', '=', 'department.dep_id')
            ->select('users.*', 'dep_name')
            ->get();

        return view("admin.pages.user.show", compact('title', 'keyword', 'description', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = "Add";
        $departments =  DB::table('department')->pluck('dep_name', 'dep_id');
        return view('admin.pages.user.form', compact('method', 'departments'));
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
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'name' => 'required',
            'nickname' => 'required',
            'position' => 'required'
        ]);

        $name = $request->input("name");
        $nickname = $request->input("nickname");
        $username = $request->input("username");
        $password = $request->input("password");
        $dep_id = $request->input("dep_id");
        $level = $request->input("level");
        $is_manager = $request->input("is_manager");
        $is_active = $request->input("is_active");
        $position = $request->input("position");


        $params["username"] = $username;
        $params["name"] = $name;
        $params["nickname"] = $nickname;
        if (strlen($password) > 0)
            $params["password"] = Hash::make($password);

        $params["dep_id"] = $dep_id;
        $params["level"] = $level;
        $params["is_manager"] = $is_manager;
        $params["is_active"] = $is_active;
        $params["position"] = $position;
        $params['created_at'] = date('Y-m-d H:i:s');
        $params['created_by'] = Auth::user()->name;
        $params['updated_at'] = date('Y-m-d H:i:s');



        DB::table("users")->insert($params);
        return redirect("User");
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
        //
        $departments =  DB::table('department')->pluck('dep_name', 'dep_id');

        $user = DB::table("users")->where('id', $id)->first();

        $method = "Edit";
        return view('admin.pages.user.form', compact('method', 'user', 'departments'));
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
            'username' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'name' => 'required',
            'nickname' => 'required',
            'position' => 'required'
        ]);



        $name = $request->input("name");
        $nickname = $request->input("nickname");
        $username = $request->input("username");
        $password = $request->input("password");
        $dep_id = $request->input("dep_id");
        $level = $request->input("level");
        $is_manager = $request->input("is_manager");
        $is_active = $request->input("is_active");
        $position = $request->input("position");


        $params["username"] = $username;
        $params["name"] = $name;
        $params["nickname"] = $nickname;
        if (strlen($password) > 0)
            $params["password"] = Hash::make($password);

        $params["dep_id"] = $dep_id;
        $params["level"] = $level;
        $params["is_manager"] = $is_manager;
        $params["is_active"] = $is_active;
        $params["position"] = $position;
        $params['updated_by'] = Auth::user()->name;
        $params['updated_at'] = date('Y-m-d H:i:s');

        if ($request->file('signature')->isValid()) {
            // $path = $request->signature->path();
            // $extension = $request->signature->extension();
            // $clientOriginalName = $request->signature->getClientOriginalName();
            // $newFileName = time() . $clientOriginalName;
            // $uploadedFile = $request->file('signature');
            // dd($path,$extension,$clientOriginalName,$newFileName,$uploadedFile);
            // Save File to local drive
            // Storage::putFileAs('attachment.signature', $uploadedFile, $newFileName);

            $filepath = $request->file('signature')->store('attachment/signature');
            $params['signature'] = $filepath;
            
        }


        DB::table("users")
            ->where('id', $id)
            ->update($params);

        return redirect("User");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("users")
            ->where('id', $id)
            ->delete();
        return redirect("User");
    }
}
