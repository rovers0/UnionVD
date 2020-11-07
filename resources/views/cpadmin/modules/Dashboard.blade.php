@extends('cpadmin.master')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-photo-video"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>activate</h3></span>
                <span class="info-box-number">TOTAL :{{$data['activate']}} </span>
                <p class="card-text"><small class="text-muted">Last updated : {{$data['date']}}</small></p>
                <p class="card-text"><small class="text-muted">{{$data['time']}}</small></p>
                <a _ngcontent-ldw-c121="" class="small text-primary stretched-link" href="/admin/event/index">View Details</a>
              </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-success "><i class="fas fa-bullhorn"></i></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>Notification</h3></span>
                <span class="info-box-number">TOTAL : {{$data['noti']}}</span>
                <p class="card-text"><small class="text-muted">Last updated : {{$data['date']}}</small></p>
                <p class="card-text"><small class="text-muted">{{$data['time']}}</small></p>
                <a _ngcontent-ldw-c121="" class="small text-primary stretched-link" href="/admin/noti/index">View Details</a>
              </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-th"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>Class</h3></span>
                <span class="info-box-number">TOTAL : {{$data['class']}}</span>
                <p class="card-text"><small class="text-muted">Last updated : {{$data['date']}}</small></p>
                <p class="card-text"><small class="text-muted">{{$data['time']}}</small></p>
                <a _ngcontent-ldw-c121="" class="small text-primary stretched-link" href="/admin/class/index">View Details</a>
              </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="ion ion-ios-people-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>User</h3></span>
                <span class="info-box-number">TOTAL : {{$data['user']}} </span>
                <p class="card-text"><small class="text-muted">Last updated : {{$data['date']}}</small></p>
                <p class="card-text"><small class="text-muted">{{$data['time']}}</small></p>
                <a _ngcontent-ldw-c121="" class="small text-primary stretched-link" href="/admin/user/index">View Details</a>
              </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="card" style="width: 100%">
            <div class="card-header">
                <h3 class="card-title">Danh sách Phim mới cập nhật</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered ">
                   <thead>
                      <tr>
                         <th>STT</th>
                         <th>Image</th>
                         <th>Name</th>
                         <th>Description</th>
                         <th>Category</th>
                         <th>Total Chap</th>
                         <th>Year</th>
                         <th>created_at</th>
                        
                      </tr>
                   </thead>
                   <tbody>
                       @foreach ($flim as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{$item->image}}" width="180px" height="250px" alt=""> </td>
                            <td>{{ str_replace('-',' ',$item->name)}}</td>
                            <td>{!!$item->description!!}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->total_chap}}</td>
                            <td>{{$item->year}}</td>
                            <td> {{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td>
                        </tr>         
                        @endforeach    
                   </tbody>
                   
                </table>
             </div>
            
            <div class="card-footer">
               
            </div>
           
    </div> --}}
</div>
@endsection