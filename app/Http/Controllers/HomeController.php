<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Datetime;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //  dd(Auth::user()->role_id);
        return view('user.index');
    }
    public function red()
    {
      switch (Auth::user()->role_id) {
        case 99:
          return HomeController::admin();
          break;
        case '1':
          //dd(Auth::user()->role_id);
          return redirect()->route('user.index');
          break;
        case 55:
          //dd(Auth::user()->role_id);
          return redirect()->route('lead.index');
          break;
        default:
          return back(); 
          break;
      }
    }
    public function lead(){
     // return view('lead.index');
      return view('lead.event');
    }
    
    public function profile(){
      $user = DB::table('users')->where('id',Auth::user()->id)->first();
      $noti = DB::table('noti')->orderBy('created_at','DESC')->take(5)->get();
      $data = DB::table('activate')
            ->join('useractive', 'activate.id', '=', 'useractive.active_id')
            ->select('activate.*', 'useractive.id','useractive.status')
            ->where('useractive.user_id',Auth::user()->id)
            ->get();
      $evalu = DB::table('users')
          ->join('usersevaluate', 'users.id', '=', 'usersevaluate.user_id')
          ->join('evaluate', 'evaluate.id', '=', 'usersevaluate.evaluate_id')
          ->where('usersevaluate.user_id',Auth::user()->id)
          ->where('evaluate.status',1)
          ->sum('usersevaluate.admin');
      $none = DB::table('users')
          ->join('usersevaluate', 'users.id', '=', 'usersevaluate.user_id')
          ->join('evaluate', 'evaluate.id', '=', 'usersevaluate.evaluate_id')
          ->select('evaluate.name', 'usersevaluate.owner','usersevaluate.lead','usersevaluate.admin','usersevaluate.review')
          ->where('usersevaluate.user_id',Auth::user()->id)
          ->where('evaluate.status',1)
          ->get();
          // ->get();
      // $data = DB::table('activate')->orderBy('created_at','DESC')->take(5)->get();
      //dd($none);
       return view('lead.profile',['user'=>$user,'noti'=>$none,'event'=>$data,'escore'=>$evalu]);
     }
    public function admin()
    {
        $data = DB::table('activate')->orderBy('created_at','DESC')->take(5)->get();
        $count['activate'] = DB::table('activate')->count();
        $count['noti'] = DB::table('noti')->count();
        $count['class'] = DB::table('class')->count();
        $count['user'] = DB::table('users')->where('role_id','<',99)->count();
        $count['date'] = date("d/m/Y");
        $count['time'] =  date("h:i:sa");
      //  dd($count);
        return view('cpadmin.modules.Dashboard',['data'=>$count]);
    }
}
