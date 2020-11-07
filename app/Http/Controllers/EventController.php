<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Datetime;
use File;
use Illuminate\Http\Request;

class EventController extends Controller
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
        $data = DB::table('activate')->where('id','<>',0)->orderBy('id','DESC')->get();
        return view('cpadmin.modules.event.index',['event'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpadmin.modules.event.create');
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
            'name' => 'bail|required|string',
            'content' => 'bail|required|string',
            'address' => 'bail|required|string',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:100000',
            //'description' => 'bail',
            ]);
        $data =($request->except('_token'));
        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('img'), $imageName);
        $data['image'] = $imageName;
        $data['name'] = trim($data['name']);
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
         DB::table('activate')->insert($data); 

         return redirect()->route('admin.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('users')
        ->join('useractive', 'users.id', '=', 'useractive.user_id')
        ->select('users.*', 'useractive.id','useractive.status')
        ->where('useractive.active_id',$id)
        ->get();
        // dd($data);
        return view('cpadmin.modules.event.listuser',['user'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = DB::table('activate')->where('id',$id)->first();
        return view('cpadmin.modules.event.edit',['item'=>$cate]);
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
            'address' => 'bail|required|string',
            'image' => 'mimes:jpeg,jpg,png,gif|max:100000',
            //'description' => 'bail',
            ]);
        $data =($request->except('_token'));
        if (isset($data['image'])) {
            $imageName = time().'.'.$data['image']->getClientOriginalExtension();
            $data['image']->move(public_path('img'), $imageName);
            $data['image'] = $imageName;
        } else {
            # code...
        }
        $data['name'] = trim($data['name']);
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        DB::table('activate')->where('id',$id)->update($data); 

        return redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('activate')->where('id',$id)->first();
        $path = '/img/'.$data->image;
        if(File::exists(public_path($path))){

            File::delete(public_path($path));

        }
        DB::table('useractive')->where('active_id',$id)->delete();
        DB::table('activate')->where('id',$id)->delete();

        return redirect()->route('admin.event.index');
    }

    public function valu(Request $request, $id)
    {
        $data =($request->except('_token'));
        $retVal= DB::table('useractive')->where('id',$id)->update($data);
        if ($data['status'] == 0) {
            $query = DB::table('users')
            ->join('useractive', 'users.id', '=', 'useractive.user_id')
            ->select('users.total_score','users.id')
            ->where('useractive.id',$id)
            ->first();
            //dd($query->total_score);
            DB::table('users')->where('id',$query->id)->update(['total_score'=>$query->total_score-5]);
           
            
        } 
        
       
       if ($retVal) {
            return true;
        } else {
            return false;
        }
    }
}
