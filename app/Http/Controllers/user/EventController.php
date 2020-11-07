<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Datetime;
use Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
   
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data =($request->except('_token'));
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        $check = DB::table('useractive')->where('active_id',$data['active_id'])->where('user_id',Auth::user()->id)->get();
        if (count($check)== 0) {
            DB::table('useractive')->insert($data);
            return true;
        } else {
            return false;
        }
        
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
    public function show()
    {
        $data= DB::table('activate')
                ->WhereNotExists(function ($query)
                {
                    $query->select(DB::raw(1))
                    ->from('useractive')
                    ->where('user_id',Auth::user()->id)
                    ->whereRaw('useractive.active_id = activate.id');
                })
                ->where('status','=',0)
                ->get();
        return view('user.event',['event'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('useractive')->where('id',$id)->delete();

        return true;
    }

    
}
