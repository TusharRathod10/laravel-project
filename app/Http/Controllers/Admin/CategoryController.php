<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

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
        $validate = $request->validated();
        $category = new Category();
        $category->name = $validate['name'];
        $category->slug = Str::slug($validate['slug']);
        $category->description = $validate['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(111111111, 999999999) . '.' . $extension;
            $file->move('assets/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $validate['meta_title'];
        $category->meta_keyword = $validate['meta_keyword'];
        $category->meta_description = $validate['meta_description'];

        $category->status = $request->status == TRUE ? '1' : '0';
        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(CategoryFormRequest $request, $category)
    {
        $validate = $request->validated();
        $category = Category::findOrFail($category);

        $category->name = $validate['name'];
        $category->slug = Str::slug($validate['slug']);
        $category->description = $validate['description'];

        if ($request->hasFile('image')) {
            $destination = 'assets/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(111111111, 999999999) . '.' . $extension;
            $file->move('assets/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $validate['meta_title'];
        $category->meta_keyword = $validate['meta_keyword'];
        $category->meta_description = $validate['meta_description'];

        $category->status = $request->status == TRUE ? '1' : '0';
        $category->update();

        return redirect('admin/category')->with('message', 'Category Update Successfully');
    }
}
