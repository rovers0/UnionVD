<?php
 namespace App\Http\ViewComposers;
 use Illuminate\Support\Facades\DB;
 use Datetime,Redirect;
 use Illuminate\View\View;

 class userComposers
 {
     public $menber;
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {  
        
        $this->menber =  DB::table('users')->where('role_id','<>',99)->orderby('name','ASC')->get();
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $view->with('listuser', end($this->menber));
        
     }
 }