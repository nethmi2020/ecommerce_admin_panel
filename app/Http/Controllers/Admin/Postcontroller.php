<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormrequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Postcontroller extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin/posts/index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('status','1')->get();

        return view('admin/posts/create', compact('categories'));

    }
    public function store(PostFormrequest $request)
    {
        $data = $request->validated();

        $post = new Post();
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];

        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->save();

        return redirect('admin/posts')->with('message', 'Post added successfully');

    }

    public function edit($post_id)
    {
        $categories = Category::where('status','1')->get();
        $post = Post::find($post_id);

        return view('admin/posts/edit', compact('post','categories'));
    }

    public function update(PostFormrequest $request, $post_id)
    {

        $data = $request->validated();

        $post = Post::find($post_id);
        $post->update([
            'category_id'=>$data['category_id'],
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'yt_iframe' => $data['yt_iframe'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keyword' => $data['meta_keyword'],
            'status' => $request->has('status') ? '1' : '0',
            'created_by' => Auth::user()->id,
        ]);

        $post->save();

        return redirect('admin/posts')->with('message', $post->name.' Post updated successfully');

    }

    public function destroy($post_id)
    {

        $post = Post::find($post_id);
        if ($post) {
            $post->delete();
            return redirect('admin/posts')->with('message', 'Posts Deleted Successfully');
        } else {
            return redirect('admin/posts')->with('message', 'Not Found');
        }

    }
}
