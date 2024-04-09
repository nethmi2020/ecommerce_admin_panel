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
        <form action="{{url('admin/add_category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="">Category Name</label>
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
                    <input type="text" name="description" class="form-control">
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
                    <label for="">Navbar Status</label>
                    <input type="checkbox" name="navbar_status" >
                </div>
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
