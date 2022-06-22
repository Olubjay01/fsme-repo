@extends('Layouts.master')
@section('title','Admin-Category')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Category <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <table class="table table-striped hover" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Keyword</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td><img src="{{asset('upload/category/'.$item->image)}}" width="40px" height="30px" alt="image"></td>
                        <td>{{$item->meta_keyword}}</td>
                        <td>{{$item->status=='1'?'Hidden':'Shown'}}</td>
                        <td>
                            <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection