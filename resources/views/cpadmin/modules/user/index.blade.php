@extends('cpadmin.master')
@section('title','Index')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách</h3>
            <div class="card-tools">
                <a href="{{Route('admin.user.register')}}" class="btn btn-primary"  title="Create new Category">ADD MORE</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>STT</th>
                     <th>MSSV</th>
                     <th>Name</th>
                     <th>EMail</th>
                     <th>Class</th>
                     <th>PassWord</th>
                     <th>Address</th>
                     <th>Phone</th>
                     <th>created_at</th>
                     <th>EDIT</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                   @foreach ($user as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->MSSV}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>@foreach ($listclass as $class)
                            @if ($class->id == $item->class_id)
                            {{$class->MS}}
                            @else
                                
                            @endif
                        @endforeach</td>
                        <td><button class="btn btn-primary" name="resetpass"data-url="{{Route('admin.user.reset',['id'=>$item->id])}}">Reset Password</button></td>
                        <td>
                            {!!$item->address !!} &nbsp;
                            {{$item->wards}}
                            {{$item->districts}}
                            {{$item->provinces}} 
                        </td>
                        <td>{{$item->phone}}</td>
                        <td> {{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td>
                        <td><a href="{{Route('admin.user.edit',['id'=>$item->id])}}">EDIT</a></td>
                        <td><a href="{{Route('admin.user.destroy',['id'=>$item->id])}}" onclick="return checkdelete('Are You Sure delete this User ?')">DELETE</a></td>
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