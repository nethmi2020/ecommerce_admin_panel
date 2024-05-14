@extends('layouts.master')
@section('title',' View Users')

@section('content')


        <div class="card">
        <div class="card-header">
                <h4>View User</h4>
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
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ $user->role_as == '1' ? 'Admin' : ($user->role_as == '2' ? 'Blogger' : 'User') }}</td>
                                    <td><a href="{{ url('admin/edit_users/'.$user->id) }}" class="btn btn-success">Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
               </div>
        </div>
            
                   

@endsection
