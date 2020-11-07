@extends('cpadmin.master')
@section('title','notification')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách</h3>
            <div class="card-tools">
                <a href="{{Route('admin.noti.create')}}" class="btn btn-primary"  title="Create new ">ADD MORE</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>content</th>
                    <th>created_at</th>
                    <th>EDIT</th>
                    <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                   @foreach ($noti as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{!!$item->content!!}</td>
                        <td> {{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td>
                        <td><a class="bg-primary rounded-pill p-2 text-center" href="{{Route('admin.noti.edit',['id'=>$item->id])}}">EDIT</a></td>
                        <td><a class="bg-danger rounded-pill p-2 text-center" href="{{Route('admin.noti.destroy',['id'=>$item->id])}}" onclick="return checkdelete('Are You Sure delete this Chapter ?')">DELETE</a></td>
                    </tr>         
                    @endforeach    
               </tbody>
               
            </table>
         </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
@endsection
