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
  <header class="mb-5">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php $i=0; ?>
              @foreach ($slider as $sl)
              <li data-target="#carouselExampleCaptions" data-slide-to="{{$i}}" 
                @if( $i == 0 )
                class="active"></li>
                @else
                ></li>
                @endif
              <?php $i++; ?>
              @endforeach
      </ol>
      <div class="carousel-inner">
        @for ($i = 0; $i < 4; $i++)
            @if ($i == 0)
              <div class="carousel-item active">
                <a href="{{route('post',['id'=>$slider[$i]->id])}}" title="{{$slider[$i]->name}}">
                <img src="{{asset('/img/'.$slider[$i]->image)}}" alt="{{$slider[$i]->name}}" style="background-image: url({{asset('/img/'.$slider[$i]->image)}}); width:1600px; height:500px"/>
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{$slider[$i]->name}}</h4>
                    <p>{!! substr( $slider[$i]->content,0,160 )!!}...</p>
                </div>
                </a>
              </div>
            @else
            <div class="carousel-item ">
              <a href="{{route('post',['id'=>$slider[$i]->id])}}" title="{{$slider[$i]->name}}">
              <img src="{{asset('/img/'.$slider[$i]->image)}}" alt="{{$slider[$i]->name}}" style="background-image: url({{asset('/img/'.$slider[$i]->image)}}); width:1600px; height:500px"/>
              <div class="carousel-caption d-none d-md-block">
                  <h3>{{$slider[$i]->name}}</h4>
                  <p>{!! substr( $slider[$i]->content,0,160 )!!}...</p>
              </div>
              </a>
            </div>
            @endif
        @endfor
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>
  {{ csrf_field() }}

 <div class="container" id="post_data">
    <div class="row" id="results">
      <div class=" col-md-10 mx-auto">
        </div>
      </div>
    </div>
  </div>

 
    
@endsection