@extends('cpadmin.master')
@section('title','edit')
@section('content')
<form action="{{route('admin.evaluate.addpost')}}" method="post">
    @csrf
    <table id="example1" class="table table-bordered table-striped">
        <tbody>   
            <tr><td>ID</td><td>136{{$item->id}}15128</td></tr>
            <tr><td>NAME: </td><td>{{$item->name}}<input type="hidden" class="form-control" name="evaluate_id"   value="{{ $item->id}}"></td></tr>
            <tr><td>Status: </td><td>
                <select class="form-control" id="status" name="user_id">
                
                   @foreach($listusers as $user)
                        <option  value="{{$user->id}}" selected class="text-success"><p >{{$user->name}}</p></option>
                   @endforeach
                </select>
                </td></tr>
            <tr><td>CREATED_AT</td><td>{{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td></tr>
            <tr>
                 <td></td>
                 <td><button type="submit"  onclick="return checkdelete('Are You Sure for this changed ?')" class="btn btn-primary ">Confirm Update this list</button></td>
             </tr>          
        </tbody>
     </table>
</form>
@endsection