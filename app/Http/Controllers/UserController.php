<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Datetime;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
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
        $data = DB::table('users')->orderBy('id','DESC')->where('role_id', '<>', 99)->get();
    
        return view('cpadmin.modules.user.index',['user'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpadmin.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|max:250',
            'MSSV' => 'bail|required|max:250|min:8|unique:users',
            'email' => 'bail|string|unique:users',
            'class_id' => 'bail|required|gt:0',
            // 'image' => 'mimes:jpeg,jpg,png,gif|required|max:100000',
            ]);
        $data =($request->except('_token'));
        // dd($data);
        $sub = "";
        $test =$data['address'];
            foreach ($test as $key => $value) {
                $sub = $sub."{$value} "."&nbsp;"  ;
        }
        $data['address'] = $sub;
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        $data['email_verified_at'] = new DateTime();
        $data['password'] = Hash::make($data['MSSV']);
        // dd($data);
         DB::table('users')->insert($data); 

         return Redirect::back()->with('status', 'Thêm thành công Mssv'.$data['MSSV']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        
        $data->password = Hash::make($data->MSSV);
        //dd($data);
        DB::table('users')->where('id',$id)->update(['password' => $data->password]); 

        return true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = DB::table('users')->where('id',$id)->first();

        return view('cpadmin.modules.user.edit',['item'=>$cate]);
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
        $data =($request->except('_token'));
        $data['updated_at'] = new DateTime();
     
        DB::table('users')->where('id',$id)->update($data); 

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use($id){
            DB::table('useractive')->where('user_id',$id)->delete();
            DB::table('usersevaluate')->where('user_id',$id)->delete();
            DB::table('users')->where('id',$id)->delete();
        });
        return redirect()->route('admin.user.index');
    }
}
