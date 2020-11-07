@extends('cpadmin.master')
@section('title','Create event')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Event Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.event.store') }}" enctype="multipart/form-data">
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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Start Time') }}</label>
                            <div class="col-md-10">
                                <input id="stime" type="datetime-local"  class="form-control" name="stime"  value="{{old('stime')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('End Time') }}</label>
                            <div class="col-md-10">
                                <input id="etime" type="datetime-local" class="form-control" name="etime"  value="{{old('etime')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Content') }}</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" placeholder="Description ..." name="content">{{old('content')}}</textarea>
                                <script>
                                    CKEDITOR.replace('content');
                                </script>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Image') }}</label>
                            <div class="col-md-10">
                                <input type="file" name="image" id="exampleInputFile" accept="image/x-png,image/gif,image/jpeg" required oninvalid="this.setCustomValidity('Bạn chưa chọn flie hình ảnh')"
                                 value="{{old('image')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label text-md-left">{{ __('Address') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="address"  value="{{old('address')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Score') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="score"  value="{{old('score')}}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add ') }}
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