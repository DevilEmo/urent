@extends('layouts.app')
@section('content')
<div class="row m-0">
    <div class="card col-sm-12 col-md-6 m-auto">
        <div class="card-header">Settings</div>
        <form action="{{route('setting.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="name">Contact Number:</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
            </div>
            <div class="form-group">
                <label for="name">Valid ID 1:</label>
                <input type="file" name="valid_id" id="valid_id" class="form-control">
            </div>
            <div class="form-group">
                    <label for="name">Valid ID 2:</label>
                    <input type="file" name="valid_id2" id="valid_id" class="form-control">
                </div>
            
            
            <div class="form-group">
                <label for="name">Account Status:</label>
                <input type="text" name="account_type" id="account_type" disabled class="form-control" value="{{$user->account_type}}">
            </div>
            
            <div class="form-group">
                <input type="submit" name="edit" id="edit" class="btn btn-primary btn-block" value="Update">
            </div>
        </div>
        </form>

    </div>
    <div class="col-sm-12 col-md-4 mr-auto">
        <div class="card">
            <div class="card-header">
                Password
            </div>
            <div class="card-body">
            <form action="{{ route('setting.store') }}" method="POST">
                    @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
    
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
    
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
    
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>    
            </form>
            </div>
        </div>
    </div>
</div>
    

@endsection
        
     
