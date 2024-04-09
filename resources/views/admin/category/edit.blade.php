

@extends('layouts.master')
@section('title','Category View')

@section('content')



<div class="container- fluid px-4">
    <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Category</h4>
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
        <form action="{{url('admin/update_category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{$category->slug}}"  class="form-control">
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="">Description</label>
                    <input type="text" name="description"  value="{{$category->description}}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
            <h6>SEO Tags</h6>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title"  value="{{$category->meta_title}}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">Meta Description</label>
                    <input type="text" name="meta_description" value="{{$category->meta_description}}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">Meta Keywords</label>
                    <input type="text" name="meta_keyword" value="{{$category->meta_keyword}}" class="form-control">
                </div>
            </div>
          
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Navbar Status</label>
                    <input type="checkbox" name="navbar_status" {{$category->navbar_status=='1' ?'checked':''}}/>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status"  {{$category->status=='1' ?'checked':''}}/>
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
