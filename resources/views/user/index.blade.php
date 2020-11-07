@extends('userpage')
@section('title','Index')
@section('content')
<style>
  .custom-file-input ~ .custom-file-label::after {
    content: "Elegir";
}
</style>

<div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Callouts
                </h3>
              </div>
              <!-- /.card-header -->
              @foreach($noti as $item)
              <div class="card-body">
               
                <div class="callout callout-info">
                  <h5 class="text-danger" >{{$item->name}}</h5>

                  <p>{!! $item->content !!}</p>
                </div>
              </div>
              @endforeach
              <!-- /.card-body -->
            </div>
@endsection