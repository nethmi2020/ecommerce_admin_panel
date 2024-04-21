@extends('layouts.master')
@section('title','Add Posts')

@section('content')


<div class="container- fluid px-4">
    <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Posts</h4>
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
        <form action="{{url('admin/add_posts')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="category_id">Select Category</label>
                    <select name="category_id" class="form-control">
                            <option value="">Please select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="">Post Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="">Description</label>
                    <!-- <input type="text" id="mysummernote" name="description" class="form-control"> -->
                    <textarea name="description" class="form-control" id="mysummernote"  rows="4"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="">YT Iframe</label>
                    <input type="text" name="yt_iframe" class="form-control">
                </div>
            </div>
            <h6>SEO Tags</h6>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">Meta Keywords</label>
                    <input type="text" name="meta_keyword" class="form-control">
                </div>
            </div>
          
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" >
                </div>
                <div class="col-md-6 align-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            
        </form>
    </div>
</div>
            
                   

@endsection
