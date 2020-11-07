<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Datetime;
use Auth;
use App\User;
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
        $noti = DB::table('noti')->orderBy('created_at','DESC')->take(5)->get();
        return view('user.index',['noti'=>$noti,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
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
    public function edit(Request $request)
    {
        $validatedData = $request->validate([
            'img' => 'required|max:100000',
            ]);
        $data =($request->except('_token','role_id'));
        $imageName = time().'.'.$data['img']->getClientOriginalExtension();
        $data['img']->move(public_path('img'), $imageName);
        $data['img'] = $imageName;
        $data['updated_at'] = new DateTime();
        
        DB::table('users')->where('id',Auth::user()->id)->update($data); 
        return Redirect::back()->with('arlert', ' thành công ');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data =($request->except('_token','role_id'));
        $data['updated_at'] = new DateTime();
        //dd($data);
     
        DB::table('users')->where('id',Auth::user()->id)->update($data); 

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'same:re-typepassword|min:8|different:password',
        ]);
        
        if (Hash::check($request->password, $user->password)) { 
           $user->fill([
            'password' => Hash::make($request->new_password)
            ])->save();
        
           $request->session()->flash('success', 'Password changed');
            return redirect()->back()->with('status', 'Password changed');
        
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back()->with('status','Old Password does not match');
        }
    }
}
