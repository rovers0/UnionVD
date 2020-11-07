@extends('master')
@section('content')
  <!-- Page Header -->
  <style>
  img{
    max-width: 100%;
    height: auto;
}
  
</style>
  <header class="masthead" style="background-image: url({{asset('/img/'.$post->image)}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$post->name}}</h1>
            <span class="meta">Posted by
              <a href="#">Admin</a>
              on {{date("d/m/Y-h:i:s",strtotime($post->stime))}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto">
        {!! $post->content !!}
        </div>
      </div>
    </div>
  </article>

  <hr>
@endsection