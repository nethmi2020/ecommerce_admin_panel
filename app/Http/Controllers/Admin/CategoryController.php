<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormrequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin/category/index', compact('category'));
    }

    public function create()
    {
        return view('admin/category/create');
    }

    public function store(CategoryFormrequest $request)
    {
        $data = $request->validated();

        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category')->with('message', 'Category added successfully');

    }

    public function edit($category_id)
    {

        $category = Category::find($category_id);
      
        return view('admin/category/edit', compact('category'));
    }

    public function update(CategoryFormrequest $request, $category_id)
    {

        $data = $request->validated();

        $category = Category::find($category_id);
        $category->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keyword' => $data['meta_keyword'],
            'navbar_status' => $request->has('navbar_status') ? '1' : '0',
            'status' => $request->has('status') ? '1' : '0',
            'created_by' => Auth::user()->id,
        ]);

        if ($request->hasFile('image')) {

            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->save();

        return redirect('admin/category')->with('message', 'Category updated successfully');

    }

    public function destroy($category_id)
    {

        $category = Category::find($category_id);
        if ($category) {
            $category->delete();
            return redirect('admin/category')->with('message', 'Category Deleted Successfully');
        } else {
            return redirect('admin/category')->with('message', 'Not Found');
        }

    }
}
