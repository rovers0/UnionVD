@extends('cpadmin.master')
@section('title','Profile user')
@section('content')
<style>
  .custom-file-input ~ .custom-file-label::after {
    content: "Elegir";
}

img.profile-user-img{
    width: 110px;
    height: 120px;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #28A745;
}
</style>
<div class="form-group row">
                            @if (session('status'))
                                <div class="alert alert-warning mx-auto  text-center">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
            
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('/img/'.$user->img)}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"></h3>

              <p class=" text-center">{{$user->name}}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>MSSV</b> <a class="float-right">{{$user->MSSV}}</a>
                </li>
                <li class="list-group-item">
                  <b>Class</b> <a class="float-right"><td>@foreach ($listclass as $class)
                            @if ($class->id == $user->class_id)
                            {{$class->MS}}
                            @else
                                ERROR
                            @endif
                        @endforeach</td></a>
                </li>
                <li class="list-group-item">
                  <b>Toatal event score</b> <a class="float-right">{{$user->total_score}}</a>
                </li>
                <li class="list-group-item">
                  <b>Toatal Reviews score</b> <a class="float-right">{{$escore}}</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="timeline">
                  <!-- The timeline -->
                 
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    @foreach($event as $ev)
                    <div class="time-label">
                      <span class="bg-danger">
                      {{date("d/m/Y",strtotime($ev->stime))}}
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div id="{{$ev->id}}">
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i></span>

                        <h3 class="timeline-header">{{$ev->name}}</h3>

                        <div class="timeline-body">
                          {!! substr( $ev->content,0,200) !!}... 
                        </div>
                        <div class="timeline-footer">
                          
                          
                          @switch($ev->status)
                                    @case(1)
                                    <a href="#" class="btn btn-primary btn-sm"> Đã Đăng KÍ</a>
                                        @break
                                    @case(2)  
                                    <a href="#" class="btn btn-primary btn-sm">Score : {{$ev->score}}</a>
                                    <a href="#" class="btn btn-success btn-sm">  CÓ Tham Gia</a>                                     
                                       
                                        @break
                                    @default
                                    <a href="#" class="btn btn-primary btn-sm">Score : -5</a>
                                    <a href="#" class="btn btn-danger btn-sm"> Không Tham Gia</a>
                                      
                                        
                                @endswitch
                          
                          
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <!-- END timeline item -->
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
                  
                </div>
                <!-- /.tab-pane -->

                
            </div><!-- /.card-body -->
          </div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection