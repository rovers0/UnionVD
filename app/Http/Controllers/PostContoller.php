<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class PostContoller extends Controller
{
    public function homepage()
    {

      // session(['pst' => 0]);
      // $data = DB::table('activate')->orderBy('stime','DESC')->limit(2)->get();
      $randomSlider = DB::table('activate')->orderBy('stime','DESC')->limit(4)->get();
      return view('welcome',['slider'=>$randomSlider]);

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
    function send(Request $request)
    {
    foreach (['needforspeed147357@gmail.com', 'ducanhksnb101@gmail.com'] as $recipient) {
      Mail::send('email.ContactMail',
      array(
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'phone' => $request->get('phone'),
        'msg' => $request->get('msg'),
      ), function($message) use ($request,$recipient)
        {
           $message->from($request->email,$request->name)->subject('Contact Message');
           $message->to($recipient);
        });
      }

      return back()->with('message_sent','Your message has been sent successfully');
      

    }
    public function oldpost(Request $request)
    {
      if($request->ajax())
     {
      if($request->id > 0)
      {
       $data = DB::table('activate')->where('id', '<', $request->id)->orderBy('id', 'DESC')->limit(5)->get();
      }
      else
      {
        
       $data = DB::table('activate')->orderBy('id', 'DESC')->limit(5)->get();
      }
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
       foreach($data as $row)
       {
        $output .= '
        <div class="container" id="post_data">
    <div class="row" id="results">
      <div class=" col-md-10 mx-auto">
            <header class="masthead" style="background-image: url('.asset('/img/'.$row->image).')">
                <div class="overlay"></div>
                <div class="container">
                <div class="row">
                    <div class=" col pt-3 text-white">
                        <a href="'.route('post',['id'=>$row->id]).'"  >
                            <h2 class="post-title text-white"  >
                            '.$row->name.'
                            </h2>
                            <h5 class="post-subtitle text-white">
                            '.substr( $row->content,0,160 ).'...
                            </h5>
                        </a>
                        <p class="post-meta ">Posted by
                            <a href="#" class="text-primary">Admin </a>
                            on '.date("d/m/Y-h:i:s",strtotime($row->stime)).'</p>
                    </div> 
                </div>
                </div>
            </header>
            <hr>
                </div>
      </div>
    </div>';
        $last_id = $row->id;
       }
       $output .= '
       <div class="container" id="post_data">
       <div class="row" id="results">
         <div class=" col-md-10 mx-auto">
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-light form-control p-0" data-id="'.$last_id.'" id="load_more_button">Load More</button>
       </div>
       </div>
       </div>
       </div>
       ';
      }
      else
      {
       $output .= '
       <div class="container" id="post_data">
       <div class="row" id="results">
         <div class=" col-md-10 mx-auto">
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-light form-control p-0">No Data Found</button>
       </div>
       </div>
       </div>
       </div>
       ';
      }
      echo $output;
     }
    }
}
