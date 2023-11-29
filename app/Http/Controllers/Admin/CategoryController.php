<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;
        $category->name = $validatedData['name'];
        // $category->slug = Str::slug($validatedData['slug']);
        // $category->description = $validatedData['description'];
        $uploadPath = 'uploads/category/';
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.' . $ext;
            $file->move('uploads/category/' ,$filename);
            $category->image =  $uploadPath.$filename;
        }
        $category->status = $request->status == true ? '1' : '0';
        // $category->meta_title = $validatedData['meta_title'];
        // $category->meta_keywords = $validatedData['meta_keywords'];
        // $category->meta_description = $validatedData['meta_description'];
        $category->save();
        return redirect('admin/category/')->with('message', 'Category Add Successfully');
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category')) ;
    }
    public function update(CategoryFormRequest $request, $category)
    {
        $category = Category::findOrFail($category);

        $validatedData = $request->validated();

        $category->name = $validatedData['name'];
        // $category->slug = Str::slug($validatedData['slug']);
        // $category->description = $validatedData['description'];
        $uploadPath = 'uploads/category/';
        if($request->hasFile('image'))
        {
            $path = '/uploads/category/' . $category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.' . $ext;
            $file->move('uploads/category/' ,$filename);
            $category->image =  $uploadPath.$filename;
        }
        $category->status = $request->status == true ? '1' : '0';
        // $category->meta_title = $validatedData['meta_title'];
        // $category->meta_keywords = $validatedData['meta_keywords'];
        // $category->meta_description = $validatedData['meta_description'];
        $category->update();
        return redirect('admin/category/')->with('message', 'Category Edit Successfully');
    }
}