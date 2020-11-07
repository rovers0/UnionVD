<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Datetime;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class NotiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('noti')->where('id','<>',0)->orderBy('id','DESC')->get();
        return view('cpadmin.modules.noti.index',['noti'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpadmin.modules.noti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $validatedData = $request->validate([
            'name' => 'bail|required',
            //'description' => 'bail',
            ]);
        
        $data =($request->except('_token'));
        $data['name'] = trim($data['name']);
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        //  dd($data);
         DB::table('noti')->insert($data); 

         return redirect()->route('admin.noti.index');
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
        $chap = DB::table('noti')->where('id',$id)->first();
        return view('cpadmin.modules.noti.edit',['chapter'=>$chap]);
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
        $validatedData = $request->validate([
            'name' => 'bail|required|string',
            'content' => 'bail|required|string',
            ]);
        $data =($request->except('_token'));
        $data['name'] = trim($data['name']);
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        DB::table('noti')->where('id',$id)->update($data); 

        return redirect()->route('admin.noti.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('noti')->where('id',$id)->delete();

        return redirect()->route('admin.noti.index');
    }
}
