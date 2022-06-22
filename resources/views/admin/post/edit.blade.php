@extends('Layouts.master')
@section('title','Admin-Edit-Post')
@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Post
                <a href="{{url('admin/posts')}}" class="btn btn-danger float-end">Back Post</a>
            </h4>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="category">Category</label>
                    <select name="category" class="form-control">
                        <option value="">-- Select Category --</option>
                        @foreach($category as $item)
                        <option value="{{$item->id}}" {{$post->category_id==$item->id?'selected':''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{$post->name}}" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="Slug">Slug</label>
                    <input type="text" name="slug" value="{{$post->slug}}" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="Description">Description</label>
                    <textarea rows="5" name="description" class="form-control">{!!$post->description!!}</textarea>
                </div>
                <div class="mb-2">
                    <label for="">Youtube I-frame Link</label>
                    <input type="text" name="yt_iframe" value="{{$post->yt_iframe}}" class="form-control">
                </div>

                <h6>Seo Tags</h6>
                <div class="mb-2">
                    <label for="Title">Meta Title</label>
                    <input type="text" name="meta_title" value="{{$post->meta_title}}" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="MetaDescription">Meta Description</label>
                    <textarea rows="5" name="meta_description" class="form-control">{!!$post->meta_description!!}</textarea>
                </div>
                <div class="mb-2">
                    <label for="keyword">Meta Keyword</label>
                    <textarea rows="3" name="meta_keyword" class="form-control">{!!$post->meta_keyword!!}</textarea>
                </div>

                <h6>Status</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" {{$post->status=='1'?'checked':''}} name="status">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update Post</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection