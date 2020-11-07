@extends('userpage')
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
            <h3 class="card-title">Danh sách Đoàn Viên</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <!-- <th>STT</th> -->
                     <th>MSSV</th>
                     <th>Name</th>
                     <th>Class</th>
                     <th>Address</th>
                     <th>user</th>
                     <th>save</th>
                  </tr>
               </thead>
               <tbody>
                @if(isset($user))
                   @foreach ($user as $item)
                    <tr>
                        <!-- <td>{{$loop->iteration}}</td> -->
                        <td>{{$item->MSSV}}</td>
                        <td>{{$item->name}}</td>
                        <td>@foreach ($listclass as $class)
                            @if ($class->id == $item->class_id)
                            {{$class->MS}}
                            @else
                                
                            @endif
                        @endforeach</td>
                        <td>
                            {{$item->address}} 
                        </td>
                        <form  data-url="{{Route('user.valu',['id'=>$item->id])}}">
                        <td><input type="text" name="owner" id="{{$item->id}}" value="{{$item->owner}}"> </td>
                        <td><button  type="submit" class="btn btn-primary">Save</button></td>
                        </form>
                        
                    </tr>         
                    @endforeach    
                @else
                    <tr><td>contact admin for list<td></tr>
                @endif
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
<script>
    
</script>
@endsection