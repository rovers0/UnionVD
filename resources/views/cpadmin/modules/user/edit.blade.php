@extends('cpadmin.master')
@section('title','edit')
@section('content')
<form action="{{route('admin.user.update',['id' => $item->id])}}" method="post">
    @csrf
    <div class="form-group-row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="form-group row">
        <label for="mssv" class="col-md-4 col-form-label text-md-right">{{ __('Mssv') }}</label>

        <div class="col-md-6">
            <input id="mssv" type="text" class="form-control @error('mssv') is-invalid @enderror" name="MSSV" value="{{$item->MSSV }}" required autocomplete="name" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $item->email }}" required autocomplete="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $item->address }}" required autocomplete="name" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('class') }}</label>

        <div class="col-md-6">
            <select class="form-control" id="class" name="class_id" >
                @foreach ($listclass as $class)
                    @if ($item->class_id == $class->id )
                        
                        <option  value="{{$class->id}}" selected>{{$class->MS}}</option>
                    @else
                        <option  value="{{$class->id}}">{{$class->MS}}</option>
                    @endif  
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('ROLE') }}</label>

        <div class="col-md-6">
            <select class="form-control" id="role" name="role_id">
                @foreach ($role as $rl)
                    @if ($item->role_id == $rl->value )
                    <option  value="{{$rl->value}}" selected>{{$rl->name}}</option>
                    @else
                        <option  value="{{$rl->value}}">{{$rl->name}}</option>
                    @endif
                    
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button onclick="return checkdelete('Are You Sure for this changed ?')" type="submit" class="btn btn-primary">
                {{ __('ComFirm Update') }}
            </button>
        </div>
    </div>
                
        
</form>
@endsection