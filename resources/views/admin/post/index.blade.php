@extends('Layouts.master')
@section('title','Admin-Post')
@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card mt-3">
        <div class="card-header">
            <h4>Posts View
                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <table class="table table-striped hover" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Post Name</th>
                        <th>Youtube Url</th>
                        <th>Keyword</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->meta_keyword}}</td>
                        <td>{{$item->status=='1'?'Hidden':'Shown'}}</td>
                        <td>
                            <a href="{{url('admin/edit-post/'.$item->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{url('admin/delete-post/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection