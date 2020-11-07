@extends('cpadmin.master')
@section('title','notification chapter')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('notification Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.noti.update',['id'=>$chapter->id]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Name') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{$chapter->name}}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Content') }}</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" placeholder="Description ..." name="content">{{$chapter->content}}</textarea>
                                <script>
                                    CKEDITOR.replace('content');
                                </script>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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