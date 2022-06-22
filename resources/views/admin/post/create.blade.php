@extends('Layouts.master')
@section('title','Admin-Add-Post')
@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Post</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{url('admin/add-post')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-2">
                    <label for="category">Category</label>
                    <select name="category" class="form-control">
                        @foreach($category as $categoryValue)
                        <option value="{{$categoryValue->id}}">{{$categoryValue->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="">Post Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="Slug">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="Description">Description</label>
                    <textarea rows="5" name="description" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label for="">Youtube I-frame Link</label>
                    <input type="text" name="yt_iframe" class="form-control">
                </div>

                <h6>Seo Tags</h6>
                <div class="mb-2">
                    <label for="Title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="MetaDescription">Meta Description</label>
                    <textarea rows="5" name="meta_description" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label for="keyword">Meta Keyword</label>
                    <textarea rows="3" name="meta_keyword" class="form-control"></textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection