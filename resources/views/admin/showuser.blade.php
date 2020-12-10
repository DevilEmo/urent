@extends('layouts.app')
@section('content')
    <div class="row">
         
         <div class="card m-auto">
             <div class="card-header">User info</div>
         <div class="card-body">
            <h5>User Name: {{$user->name}}</h5>
            <h5>User Email: {{$user->email}}</h5>
            <h5>User Contact Number: {{$user->phone}}</h5>
            <div class="img-big-wrap">
                <div> 
                    <label for="valid_id1">Valid ID: 1</label>
                    <img src="/image/{{$user->valid_id}}" alt="{{$user->valid_id}}" style="width:400px; height: 300px;">
                </div>
              </div>
            <div class="img-big-wrap">
                <div> 
                    <label for="valid_id2">Valid ID: 2</label>
                    <img src="/image/{{$user->valid_id2}}" alt="{{$user->valid_id2}}" style="width:400px; height: 300px;">
                </div>
            </div>
            <h5>User Created At: {{$user->created_at}}</h5>
            <h5>User Updated At: {{$user->updated_at}}</h5>
            <form action="/admin/user/{{$user->id}}/edit" method="POST">
                @method('put')
                @csrf
                <input type="hidden" name="certified" value="certified">
                <button type="submit" class="btn btn-block btn-primary mb-1">Certified</button>
            </form>
           
            <a href="/admin/posts" class="btn btn-secondary btn-block">back</a> 
        </div>
         </div>
         
         
    </div>
@endsection
        
     
