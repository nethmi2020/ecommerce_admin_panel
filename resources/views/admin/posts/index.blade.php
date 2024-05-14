@extends('layouts.master')
@section('title','Post View')

@section('content')


    <div class="container-fluid px-4">
    <div class="card">
            <div class="card-header">
                <h4>View Posts <a href="{{url('admin/add_posts')}}" class="btn btn-primary btn-sm float-end">Add Post</a></h4>
            </div>
            <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-bordered" id="myDataTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category </th>
                                    <th>Post Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->status=='1' ?'Hidden' :'shown'}}</td>
                                    <td><a href="{{ url('admin/edit_posts/'.$post->id) }}" class="btn btn-success">Edit</a></td>
                                    <td><a href="{{ url('admin/delete_posts/'.$post->id) }}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
               </div>
        </div>
    </div>
            
                   

@endsection
