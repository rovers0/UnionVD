@extends('cpadmin.master')
@section('title','edit')
@section('content')
<form action="{{route('admin.class.update',['id' => $item->id])}}" method="post">
    @csrf
    <table id="example1" class="table table-bordered table-striped">
        <tbody>   
            <tr><td>ID</td><td>{{$item->id}}</td></tr>
            <tr><td>NAME: </td><td><input type="text" class="form-control" name="MS" value="{{ $item->MS}}"></td></tr>
            <tr><td>description</td><td><input type="text" class="form-control" name="name" value="{{$item->name}}"></td></tr>
            <tr><td>CREATED_AT</td><td>{{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td></tr>
            <tr>
                 <td></td>
                 <td><button type="submit"  onclick="return checkdelete('Are You Sure for this changed ?')" class="btn btn-primary ">Confirm Update</button></td>
             </tr>          
        </tbody>
     </table>
</form>
@endsection