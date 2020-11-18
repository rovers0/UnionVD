@extends('cpadmin.master')
@section('title','edit')
@section('content')
<form action="{{route('admin.evaluate.update',['id' => $item->id])}}" method="post">
    @csrf
    <table id="example1" class="table table-bordered table-striped">
        <tbody>   
            <tr><td>ID</td><td>136{{$item->id}}15128</td></tr>
            <tr><td>NAME: </td><td><input type="text" class="form-control" name="name" value="{{ $item->name}}"></td></tr>
            <tr><td>Status: </td><td>
                <select class="form-control" id="status" name="status">
                    @switch($item->status)
                        @case(1)
                            <option  value="1" selected class="text-success"><p >DONE</p></option>
                            <option  value="2" class="text-danger"><p >OPEN USER</p></option>
                            <option  value="0" class="text-primary"><p >OPEN LEAD</p></option>
                            @break
                        @case(2)
                            <option  value="1" class="text-success"><p >DONE</p></option>
                            <option  value="2" selected class="text-danger"><p >OPEN USER</p></option>
                            <option  value="0" class="text-primary"><p >OPEN LEAD</p></option>
                            @break
                        @default
                            <option  value="1" class="text-success"><p >DONE</p></option>
                            <option  value="2" class="text-danger"><p >OPEN USER</p></option>
                            <option  value="0" selected class="text-primary"><p >OPEN LEAD</p></option>
                            
                    @endswitch
                    </select>
                </td></tr>
            <tr><td>CREATED_AT</td><td>{{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td></tr>
            <tr>
                 <td><a href="{{Route('admin.evaluate.addget',['id'=>$item->id])}}" class="btn btn-primary ">Add Another menber</a></td>
                 <td><button type="submit"  onclick="return checkdelete('Are You Sure for this changed ?')" class="btn btn-primary ">Confirm Update</button></td>
             </tr>          
        </tbody>
     </table>
</form>
@endsection