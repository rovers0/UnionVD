@extends('cpadmin.master')
@section('title','Index')
@section('content')
<style>
    td{
        min
    }
</style>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách Đoàn Viên Tham Gia </h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <!-- <th>STT</th> -->
                     <th>MSSV</th>
                     <th>Name</th>
                     <!-- <th>EMail</th> -->
                     <th>Class</th>
                     <th>Address</th>
                     <th>Phone</th>
                     <th>Status</th>
                  </tr>
               </thead>
               <tbody>
                   @foreach ($user as $item)
                    <tr>
                        <!-- <td>{{$loop->iteration}}</td> -->
                        <td>{{$item->MSSV}}</td>
                        <td>{{$item->name}}</td>
                        <!-- <td>{{$item->email}}</td> -->
                        <td>@foreach ($listclass as $class)
                            @if ($class->id == $item->class_id)
                            {{$class->MS}}
                            @else
                                
                            @endif
                        @endforeach</td>
                        <td>
                            {{$item->address}} &nbsp;
                        </td>
                        <td>{{$item->phone}}</td>
                        <!-- <td> {{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td> -->
                        <td><select class="form-control"  data-url="{{Route('admin.event.valu',['id'=>$item->id])}}" id="status" name="status" data-id="{{$item->id}}">
                                @switch($item->status)
                                    @case(1)
                                        <option  value="1" selected class="text-success"><p >Đã Đăng KÍ</p></option>
                                        <option  value="2" class="text-danger"><p >CÓ Tham Gia</p></option>
                                        <option  value="0" class="text-primary"><p >Không Tham Gia</p></option>
                                        @break
                                    @case(2)
                                        <option  value="1" class="text-success"><p >Đã Đăng KÍ</p></option>
                                        <option  value="2" selected class="text-danger"><p >CÓ Tham Gia</p></option>
                                        <option  value="0" class="text-primary"><p >Không Tham Gia</p></option>
                                        @break
                                    @default
                                        <option  value="1" class="text-success"><p >Đã Đăng KÍ</p></option>
                                        <option  value="2" class="text-danger"><p >CÓ Tham Gia</p></option>
                                        <option  value="0" selected class="text-primary"><p >Không Tham Gia</p></option>
                                        
                                @endswitch
                                </select></td>
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