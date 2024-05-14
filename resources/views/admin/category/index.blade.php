@extends('layouts.master')
@section('title','Category View')

@section('content')


        <div class="card">
            <div class="card-header">
                <h4>View Category <a href="{{url('admin/add_category')}}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>
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
                                    <th>Category Name</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <img width="50px" height="50px" src="{{asset('uploads/category/'.$item->image)}}" alt="">
                                    </td>
                                    <td>{{$item->status=='1' ?'Hidden' :'shown'}}</td>
                                    <td><a href="{{ url('admin/edit_category/'.$item->id) }}" class="btn btn-success">Edit</a></td>
                                    <td><a href="{{ url('admin/delete_category/'.$item->id) }}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
               </div>
        </div>
            
                   

@endsection
