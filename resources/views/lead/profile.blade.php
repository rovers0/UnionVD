@extends('home')
@section('title','Profile')
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
              <form action="{{route('editimg')}}" method="post" id="formchangimg" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                <div class="custom-file" id="customFile">
                  <input type="file" class="custom-file-input" name="img" id="exampleInputFile" accept="image/x-png,image/gif,image/jpeg" required >
                  <style>
                      .custom-file-input ~ .custom-file-label::after {
                            content: "Choose";
                        }
                  </style>
                  <label class="custom-file-label" for="exampleInputFile" >
                      Choose new Image 
                  </label>
                </div>
                <button type="submit" href="#" class="btn btn-primary btn-block"><b>Change</b></button>
              </form>
            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-envelope"></i> Email</strong>

                <p class="text-muted">
                {{$user->email}}
                </p>

                <hr>
                <strong><i class="fas fa-phone"></i></i> Phone</strong>

                <p class="text-muted">
                  {{$user->phone}}
                </p>

                <hr>
                <strong><i class="fas fa-birthday-cake"></i> Birthday</strong>

                <p class="text-muted">{{date("d/m/Y",strtotime($user->birthday))}}</p>

                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{!!$user->address!!}</p>

                <hr>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="activity">
                  <!-- Post -->
                  @if(isset($noti))
                    @foreach($noti as $item)
                          <div class="card">
                      <div class="card-header">
                        <h3 class="card-title text-primary">{{$item->name}}</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                        </div>
                      </div>
                      <div class="card-body" style="display: block;">
                          <div class="row">
                            <div class="col-md-4 ">
                              <b>Cá nhân :</b>  
                            </div>
                            <div class="col-md-8">
                              {{ $item->owner }}
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <b>Bí Thư Lớp :</b> 
                            </div>
                            <div class="col-md-8">
                              {{ $item->lead }}
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <b>Đoàn Trường :</b> 
                            </div>
                            <div class="col-md-8">
                              {{ $item->admin }}
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <b>Đánh Giá Chung :</b> 
                            </div>
                            <div class="col-md-8">
                              {{ $item->review }}
                            </div>
                          </div>
                      
                      </div>
                      <!-- /.card-body -->
                    </div>
                    @endforeach
                    @else
                      <h3 class="text-primary"> chưa có đánh giá hoàn thành về bạn</h3>
                  @endif
                  <!-- /.post -->

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
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
                                    <a href="#"  data-url="{{Route('destroy',['id'=>$ev->id])}}" data-id="{{$ev->id}}" class="destroy btn btn-danger btn-sm">Hủy Đăng Kí</a>
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

                <div class="tab-pane" id="settings">
                 
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#infor" data-toggle="tab">Infomation</a></li>
                        <li class="nav-item"><a class="nav-link" href="#changpass" data-toggle="tab">Password</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                    
                      <div class="tab-content">
                        <div class="tab-pane active" id="infor">
                          <form class="form-horizontal" action="{{ route('editpf') }}" method="post">
                            @csrf
                              <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{$user->email}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" id="inputName" name="birthday" value="{{$user->birthday}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                  <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" class="form-control"  value="{{$user->phone}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience"  name="address" placeholder="Experience">{!! $user->address !!}</textarea> 
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                              </div>
                            </form>

                        </div>
                        <div class="tab-pane" id="changpass">
                          <form class="form-horizontal" action="{{route('change')}}" method="post">
                          @csrf
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-4 col-form-label">OLD password</label>
                              <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password"  value="{{old('password')}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-4 col-form-label">New Password</label>
                              <div class="col-sm-8">
                                <input type="password" class="form-control"  name="re-typepassword" value="{{old('re-typepassword')}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-4 col-form-label">re-type New Password</label>
                              <div class="col-sm-8">
                                <input type="password" class="form-control" id="new_password" name="new_password" value="{{old('new_password')}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
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