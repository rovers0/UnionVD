<?php
 namespace App\Http\ViewComposers;
 use Illuminate\Support\Facades\DB;
 use Datetime,Redirect;
 use Illuminate\View\View;

 class InforComposer
 {
     public $provinces ;
     public $districts;
     public $wards;
     public $class;
     public $role;
     public $topchapviews;
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {  
        
        $this->provinces =  DB::table('provinces')->orderby('name','ASC')->get();
        $this->districts = DB::table('districts')->orderby('name','ASC')->get();
        $this->wards = DB::table('wards')->orderby('name','ASC')->get();
        $this->class = DB::table('class')->where('id','<>',0)->orderby('name','ASC')->get();
        $this->role = DB::table('role')->where('id','<>',99)->orderby('id','ASC')->get();
        // $countcmt =  DB::table('comment')
        //     ->select('flim_id', DB::raw('COUNT(*) as total_cmt'))
        //     ->groupBy('flim_id')
        //     ;
        // $this->topcmt = DB::table('flim')
        //     ->joinSub($countcmt, 'countcmt', function ($join) {
        //         $join->on('flim.id', '=', 'countcmt.flim_id');
        //     })
        //     ->orderby('total_cmt','DESC')
        //     ->take(10)
        //     ->get();
        
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $view->with('listprovinces', end($this->provinces));
        $view->with('listdistricts', end($this->districts));
        $view->with('listclass', end($this->class));
        $view->with('role', end($this->role));
        $view->with(['wards'=>$this->wards]);
        
     }
 }