@extends('master')
@section('content')
    <style>
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: #212529;
        opacity: .5;
    }
    </style>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('/img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Đoàn Trường Viễn Đông</h1>
            <span class="subheading">UnionVD</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class=" col-md-10 mx-auto">
      @foreach($post as $item)
        <header class="masthead" style="background-image: url({{asset('/img/'.$item->image)}})">
            <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class=" col pt-3 text-white">
                    <a href="{{route('post',['id'=>$item->id])}}"  >
                        <h2 class="post-title text-white"  >
                        {{$item->name}}
                        </h2>
                        <h5 class="post-subtitle text-white">
                        {!! substr( $item->content,0,160 )!!}...
                        </h5>
                    </a>
                    <p class="post-meta ">Posted by
                        <a href="#" class="text-primary">Admin </a>
                        on {{date("d/m/Y-h:i:s",strtotime($item->stime))}}</p>
                </div> 
            </div>
            </div>
        </header>
       
        <hr>
    @endforeach
        <!-- Pager -->
        <!-- <div class="clearfix">
          <a id="oldpost" data-url="{{route('oldpost')}}" class="btn btn-primary float-right" >Older Posts &rarr;</a>
        </div> -->
      </div>
    </div>
  </div>

@endsection