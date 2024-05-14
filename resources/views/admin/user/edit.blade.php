

@extends('layouts.master')
@section('title','User Edit View')

@section('content')



<div class="container- fluid px-4">
    <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Update User</h4>
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
        <form action="{{url('admin/update_user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
            @method('PUT')
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="">User Name</label>
                    <input type="text"  value="{{$user->name}}" class="form-control" disabled>
                </div>
                <div class="col-md-6">
                    <label for="">Email</label>
                    <input type="text"  value="{{$user->email}}"  class="form-control" disabled>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="">Created At</label>
                    <input disabled type="text"  value="{{$user->created_at->format('d/m/Y')}}"  class="form-control">
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <label for="user role">Select User Role</label>
                    <select name="user_role" class="form-control">
                            <option value="1" {{$user->role_as=='1' ?'selected' :''}}>Admin</option>
                            <option value="0" {{$user->role_as=='0' ?'selected' :''}}>User</option>
                            <option value="2" {{$user->role_as=='2' ?'selected' :''}}>Blogger</option>
                    </select>
                </div>
                <div class="col-md-6 align-right">
                    <button type="submit" class="btn btn-primary">Update User Role</button>
                </div>
            </div>
            
        </form>
    </div>
</div>

@endsection
