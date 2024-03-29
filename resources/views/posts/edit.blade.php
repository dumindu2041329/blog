@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('posts.update', $post->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Post Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter post title" value="{{$post->title}}" required>
                            </div>
                            <div class="mb-3">
                                <label>Post Description</label>
                                <textarea name="description" class="form-control" rows="10" placeholder="Enter post description" required>{{$post->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
