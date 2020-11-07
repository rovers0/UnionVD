@extends('cpadmin.master')
@section('title','List Event')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách</h3>
            <div class="card-tools">
                <a href="{{Route('admin.event.create')}}" class="btn btn-primary"  title="Create new Category">ADD MORE</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>STT</th>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Content</th>
                     <th>Status</th>
                     <th>Time</th>
                     <th>Score</th>
                     <th>Address</th>
                     <th>EDIT</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                   @foreach ($event as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset('/img/'.$item->image)}}" width="180px" height="250px" alt=""> </td>
                        <td>{{ str_replace('-',' ',$item->name)}}</td>
                        <td>{!! substr( $item->content,0,150) !!}... </td>
                        <td>
                            @switch($item->status)
                                @case(1)
                                    <p class="text-success"> DONE</p>
                                    <a class="text-success  " href="{{Route('admin.event.showlist',['id'=>$item->id])}}">get list user</a>
                                    @break
                                @case(2)
                                    <p class="text-danger">CLOSE REGISTER</p>
                                    <a class="text-success  " href="{{Route('admin.event.showlist',['id'=>$item->id])}}">get list user</a>

                                    @break
                                @default
                                <p class="text-primary"> OPEN REGISTER</p>
                                    
                            @endswitch
                        </td>
                        <td>{{$item->stime}} - {{$item->etime}}</td>
                        <td>{{$item->score}}</td>
                        <td>{{$item->address}}</td>
                        <!-- <td> {{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td> -->
                        <td><a class="bg-primary rounded-pill p-2 text-center" href="{{Route('admin.event.edit',['id'=>$item->id])}}">EDIT</a><br><br></td>
                        <td><a class="bg-danger rounded-pill p-2 text-center" href="{{Route('admin.event.destroy',['id'=>$item->id])}}" onclick="return checkdelete('Are You Sure delete this Event ?')">DELETE</a></td>
                    </tr>         
                    @endforeach    
               </tbody>
    
            </table>
         </div>
    </div>
    <!-- /.card -->
</section>
@endsection