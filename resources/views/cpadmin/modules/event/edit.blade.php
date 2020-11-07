@extends('cpadmin.master')
@section('title','Edit ')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __(' Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.event.update',['id'=>$item->id]) }}" enctype="multipart/form-data">
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
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Name') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$item->name}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Start Time') }}</label>
                            <div class="col-md-10">
                                <input id="stime" type="text"  class="form-control" name="stime"  value="{{$item->stime}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('End Time') }}</label>
                            <div class="col-md-10">
                                <input id="etime" type="text" class="form-control" name="etime"  value="{{$item->etime}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Content') }}</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" placeholder="Description ..." name="content">{{$item->content}}</textarea>
                                <script>
                                    CKEDITOR.replace('content');
                                </script>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Image') }}</label>
                            <div class="col-md-10">
                                <input type="file" name="image" id="exampleInputFile" accept="image/x-png,image/gif,image/jpeg" 
                                 value="{{$item->image}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Old Image ') }}</label>
                            <div class="col-md-10">
                                <img src="{{asset('/img/'.$item->image)}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label text-md-left">{{ __('Address') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="address"  value="{{$item->address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Score') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="score"  value="{{$item->score}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-2 col-form-label text-md-left">{{ __('Status') }}</label>

                            <div class="col-md-10">
                                <select class="form-control" id="status" name="status">
                                @switch($item->status)
                                    @case(1)
                                        <option  value="1" selected class="text-success"><p >DONE</p></option>
                                        <option  value="2" class="text-danger"><p >CLOSE REGISTER</p></option>
                                        <option  value="0" class="text-primary"><p >OPEN REGISTER</p></option>
                                        @break
                                    @case(2)
                                        <option  value="1" class="text-success"><p >DONE</p></option>
                                        <option  value="2" selected class="text-danger"><p >CLOSE REGISTER</p></option>
                                        <option  value="0" class="text-primary"><p >OPEN REGISTER</p></option>
                                        @break
                                    @default
                                        <option  value="1" class="text-success"><p >DONE</p></option>
                                        <option  value="2" class="text-danger"><p >CLOSE REGISTER</p></option>
                                        <option  value="0" selected class="text-primary"><p >OPEN REGISTER</p></option>
                                        
                                @endswitch
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary"  onclick="return checkdelete('Are You Sure for this changed ?')">
                                    {{ __('Edit ') }}
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