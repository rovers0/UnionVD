<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Datetime;
use Illuminate\Http\Request;

class ClassController extends Controller
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
        $data = DB::table('class')->where('id','<>',0)->orderBy('id','DESC')->get();
        return view('cpadmin.modules.class.index',['category'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpadmin.modules.class.create');
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
            'MS' => 'bail|required|unique:class',
            //'description' => 'bail',
            ]);
        $data =($request->except('_token'));
        $data['name'] = trim($data['name']);
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        //  dd($data);
         DB::table('class')->insert($data); 

         return redirect()->route('admin.class.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = DB::table('class')->where('id',$id)->first();
        return view('cpadmin.modules.class.edit',['item'=>$cate]);
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
        $data['name'] = trim($data['name']);
        DB::table('class')->where('id',$id)->update($data); 

        return redirect()->route('admin.class.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        DB::table('class')->where('id',$id)->delete();

        return redirect()->route('admin.class.index');
    }

    
}
