<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $fileName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('upload/category/', $fileName);
            $category->image = $fileName;
        }
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request['navbar_status'] == true ? '1' : '0';
        $category->status = $request['status'] == true ? '1' : '0';
        $category->created_by = Auth::user()->id;

        $category->save();

        return redirect('admin/category')->with('message', 'Category added successfully');
    }

    public function edit($requestId)
    {
        $category = Category::find($requestId);
        return view("admin.category.edit", compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();
        $category = Category::find($category_id);


        $category->name = $category['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        if ($request->hasFile('image')) {
            $destination = 'upload/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $imageFile = $request->file('image');
            $fileName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('upload/category/', $fileName);
            $category->image = $fileName;
        }
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request['navbar_status'] == true ? '1' : '0';
        $category->status = $request['status'] == true ? '1' : '0';
        $category->created_by = Auth::user()->id;

        $category->update();

        return redirect('admin/category')->with('message', 'Category updated successfully');
    }
    public function destroy($category_id)
    {
        $category = Category::find($category_id);
        if ($category) {
            $destination = 'upload/category/' . $category->image;
            if (File::exists($destination)) {
                $destination = 'upload/category/' . $category->image;
                File::delete($destination);
            }
            $category->delete();
            return redirect('admin/category')->with('message', "Category with id: {$category->id} was deleted successfully");
        } else {
            return redirect('admin/category')->with('message', 'No such file with id: $category->id was found');
        }
    }
}
