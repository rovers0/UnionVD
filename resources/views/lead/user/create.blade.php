@extends('lead')
@section('title','Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lead.store') }}">
                        @csrf
                        <div class="form-group row">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
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
                                <input id="mssv" type="text" class="form-control @error('mssv') is-invalid @enderror" name="MSSV" value="{{ old('MSSV') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('class') }}</label>
                            <input type="hidden" name="class_id" value="{{ Auth::user()->class_id}}">
                            <label for="class" class="col-md-4 col-form-label text-md-left">
                                @foreach ($listclass as $item)    
                                    @if($item->id ==  Auth::user()->class_id)   
                                    {{$item->MS}}
                                    @endif
                                @endforeach
                            </label>
                                   
                            
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('ROLE') }}</label>
                            <label for="role" class="col-md-6 col-form-label text-md-left">{{ __('User') }}</label>
                            <input type="hidden" name="role_id" value="1">
                            <!-- <div class="col-md-6">
                                <select class="form-control" id="role" name="role_id">
                                    @foreach ($role as $item)
                                        <option  value="{{$item->value}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div> -->
                        </div>
                        <div class="form-group row">
                            <label for="wards" class="col-md-4 col-form-label text-md-right">{{ __('wards') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="wards" name="address[]" >
                                    <option disabled selected>vui long chon quan huyen</option>
                                    {{-- @foreach ($wards as $item)
                                        <option uid="{{$item->id}}" value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="districts" class="col-md-4 col-form-label text-md-right">{{ __('districts') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="districts" name="address[]" data-url="{{route('getwards')}}">
                                    <option disabled selected>vui long chon tinh thanh pho</option>
                                    {{-- @foreach ($listdistricts as $item)
                                        <option uid="{{$item->id}}" value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="provinces" class="col-md-4 col-form-label text-md-right">{{ __('provinces/city') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="provinces" name="address[]" data-url="{{route('getdistricts')}}">
                                    @foreach ($listprovinces as $item)
                                        <option data-id="{{$item->id}}" value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection