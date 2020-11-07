<?php

namespace App\Http\Controllers\lead;

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
        $noti = DB::table('noti')->orderBy('created_at','DESC')->take(5)->get();
        return view('lead.index',['noti'=>$noti,]);
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
        // $validatedData = $request->validate([
        //     'name' => 'bail|required|string',
        //     'content' => 'bail|required|string',
        //     'address' => 'bail|required|string',
        //     'image' => 'mimes:jpeg,jpg,png,gif|required|max:100000',
        //     //'description' => 'bail',
        //     ]);
        // $data =($request->except('_token'));
        // $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        // $data['image']->move(public_path('img'), $imageName);
        // $data['image'] = $imageName;
        // $data['name'] = trim($data['name']);
        // $data['created_at'] = new DateTime();
        // $data['updated_at'] = new DateTime();
        //  DB::table('activate')->insert($data); 

        //  return redirect()->route('admin.event.index');
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
        return view('lead.event',['event'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $cate = DB::table('activate')->where('id',$id)->first();
        // return view('cpadmin.modules.event.edit',['item'=>$cate]);
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
        
        $retVal =  DB::table('useractive')->where('id',$id)->where('user_id',Auth::user()->id)->where('status',1)->delete();
        if ($retVal) {
            return true;
        } else {
            return false;
        }
        
        
    }

    
}
