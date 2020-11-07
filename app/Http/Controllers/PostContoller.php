<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datetime;
use File;
use session;

class PostContoller extends Controller
{
    public function homepage()
    {

      session(['pst' => 0]);
      $data = DB::table('activate')->orderBy('stime','DESC')->limit(3)->get();
      return view('welcome',['post'=>$data]);

    }
    public function show($id)
    {
      $data = DB::table('activate')->where('id',$id)->first();
      
      return view('post',['post'=>$data]);
    }

    public function ab()
    {
      return view('about');
    }
    public function ct()
    {
      return view('contact');
    }
    public function oldpost(Request $rq)
    {
      $valuea = Session::get('pst');
      dd($valuea);
    }
}
