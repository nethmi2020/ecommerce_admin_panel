

@extends('layouts.master')
@section('title','Category View')

@section('content')



<div class="container- fluid px-4">
    <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Update Post
                <a href="{{url('admin/posts')}}" class="btn btn-danger btn-sm float-end">back</a></h4>
            </div>
    </div>
    <div class="card-body">
        @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
        @endif
        <form action="{{url('admin/update_posts/'.$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="category_id">Select Category</label>
                    <select name="category_id" class="form-control">
                            <option value="">Please select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{$post->category_id==$category->id ?'selected' :''}}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{$post->name}}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{$post->slug}}"  class="form-control">
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="mysummernote"  rows="4">{{!! $post->description !!}}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="">YT Iframe</label>
                    <input type="text" name="yt_iframe"  value="{{$post->yt_iframe}}" class="form-control">
                </div>
            </div>
            <h6>SEO Tags</h6>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title"  value="{{$post->meta_title}}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">Meta Description</label>
                    <input type="text" name="meta_description" value="{{$post->meta_description}}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">Meta Keywords</label>
                    <input type="text" name="meta_keyword" value="{{$post->meta_keyword}}" class="form-control">
                </div>
            </div>
          
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status"  {{$post->status=='1' ?'checked':''}}/>
                </div>
                </div>
                <div class="col-md-6 align-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            
        </form>
    </div>
</div>

@endsection
