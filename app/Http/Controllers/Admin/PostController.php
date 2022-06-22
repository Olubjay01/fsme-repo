<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index()
    {
        $post = Post::all();
        return view('admin.post.index', compact('post'));
    }

    public function create()
    {
        $category = Category::where('status', 0)->get();
        return view('admin.post.create', compact('category'));
    }

    public function store(PostFormRequest $postFormRequest)
    {
        $data = $postFormRequest->validated();
        $post = new Post;
        $post->category_id = $data['category'];
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $postFormRequest['status'] == true ? '1' : '0';
        $post->created_by = Auth::user()->id;

        $post->save();

        return redirect('admin/posts')->with('message', 'Post saved successfully');
    }
    public function edit($post_id)
    {
        $category = Category::where('status', '0')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit', compact('post', 'category'));
    }
    public function update(PostFormRequest $postFormRequest, $post_id)
    {
        $data = $postFormRequest->validated();
        $post = Post::find($post_id);
        $post->category_id = $data['category'];
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->description = $data['description'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $postFormRequest->status == true ? '1' : '0';
        $post->update();

        return redirect('admin/posts')->with('message', 'Post updated successfully');
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        return redirect('admin/posts')->with('message',"Post with ID: {$post_id} deleted successfully");
    }
}
