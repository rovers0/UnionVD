<?php


namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Datetime;
use Auth;
use Illuminate\Http\Request;

class EvaluateController extends Controller
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
        $data = DB::table('evaluate')->where('status',2)->orderBy('id','DESC')->get();
        return view('user.evaluate.index',['category'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('cpadmin.modules.evaluate.create');
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
        //     'name' => 'bail|required|unique:class',
        //     //'description' => 'bail',
        //     ]);
        // $data =($request->except('_token'));
        // $data['name'] = trim($data['name']);
        // $data['status'] = 1;
        // $data['created_at'] = new DateTime();
        // $data['updated_at'] = new DateTime();
        // //  dd($data);
        // DB::table('evaluate')->insert($data); 
        
        //  return redirect()->route('admin.evaluate.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $check = DB::table('evaluate')->where('id',$id)->where('status',2)->get();
        //dd($check);
        if (count($check) != 0) {
            $data = DB::table('users')
            ->join('usersevaluate', 'users.id', '=', 'usersevaluate.user_id')
            ->select('usersevaluate.*', 'users.MSSV','users.name','users.class_id','users.address')
            ->where('usersevaluate.evaluate_id',$id)
            ->where('users.id',Auth::user()->id)
            ->get();
        return view('user.evaluate.show',['user'=>$data]);
        } else {
            return view('404');
        }
        
       
        // dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = DB::table('evaluate')->where('id',$id)->first();
        return view('cpadmin.modules.evaluate.edit',['item'=>$cate]);
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
        $data['owner'] = $data['lead'];
        // dd($data);
        // $data = DB::table('users')
        //     ->join('usersevaluate', 'users.id', '=', 'usersevaluate.user_id')
        //     ->select('usersevaluate.*', 'users.MSSV','users.name','users.class_id','users.provinces')
        //     ->where('usersevaluate.evaluate_id',$id)
        //     ->get();
        $check =   DB::table('usersevaluate')->where('id',$id)->update($data);
        return $check;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    
}
