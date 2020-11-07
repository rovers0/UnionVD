@extends('userpage')
@section('title','notification')
@section('content')
<style>
  img{
    max-width: 100%;
    height: auto;
}
  
</style>
@if(count($event) > 0)
  @foreach($event as $item)
  <div class="col-12" id="{{$item->id}}">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
            <div class="card collapsed-card">
        <div class="card-header">
        
          <h3 class="card-title"><i class="fas fa-globe"></i>&nbsp {{$item->name}}</h3>
          
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-plus"></i></button>
          </div>
        </div>
        <div class="card-body" style="display: none;">
          <div class="row">
           
            <div class="col-12 col-md-8  order-2 order-md-1">
              {!!$item->content !!}
            </div>
            <div class="col-12 col-md-4 pl-5 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i></h5></h3>
              <ul class="list-unstyled">
                <li class="mt-2">
                  <a href="" class="btn-link text-danger mt-2"><i class="fas fa-map-marked-alt"></i> {{$item->address}}</a>
                </li>
                <li class="mt-2">
                  <a href="" class="btn-link text-secondary mt-2"><i class="fas fa-plus"></i></i> Score: {{$item->score}}</a>
                </li>
                <li class="mt-2">
                  <a href="" class="btn-link text-primary mt-2"><i class="fas fa-unlock-alt"></i></i> @switch($item->status)
                                @case(1)
                                    <span class="text-success"> DONE</span>
                                    @break
                                @case(2)
                                    <p class="text-danger">CLOSE REGISTER</p>
                                    @break
                                @default
                                <span class="text-primary"> OPEN REGISTER</span>
                                    
                            @endswitch</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
              <div class="row no-print">
                <div class="col-12">
                  <button type="put" class="registerbtn btn btn-primary float-right " style="margin-right: 5px;" data-url="{{route('user.eventregister')}}" data-id="{{$item->id}}">
                  <i class="fas fa-check-square"></i> register
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
  </div>
  @endforeach
@else
  <h1 class="text-primary text-center"> Chưa có hoạt động mới</h1>

@endif



@endsection