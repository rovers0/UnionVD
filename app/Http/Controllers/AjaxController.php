<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getdistricts(Request $request){ 
        $data = DB::table('districts')->where('province_id', $request->provinces_id)->get();
        $xhtml = null;
        foreach($data as $d)
        {
            $xhtml .= '<option data-id="'.$d->id.'" value="'.$d->name.'">'.$d->name.'</option>';
        }
      
        return $xhtml;
       
    }

    public function getwards(Request $request){
        $data = DB::table('wards')->where('district_id', $request->districts_id)->get();
        $xhtml = null;
        foreach($data as $d)
        {
            $xhtml .= '<option data-id="'.$d->id.'" value="'.$d->name.'">'.$d->name.'</option>';
        }
      
        return $xhtml;
    }
    public function getvalue(Request $request , $id){
        $data =($request->except('_token'));
        
        // $data = DB::table('users')
        //     ->join('usersevaluate', 'users.id', '=', 'usersevaluate.user_id')
        //     ->select('usersevaluate.*', 'users.MSSV','users.name','users.class_id','users.provinces')
        //     ->where('usersevaluate.evaluate_id',$id)
        //     ->get();
        $check =   DB::table('usersevaluate')->where('id',$id)->update($data);
        return $check;
    }
}
