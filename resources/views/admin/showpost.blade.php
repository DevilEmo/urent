@extends('layouts.app')
@section('content')
    <div class="row">
         <div class="card m-auto">
             <div class="card-header">
                 Post info
             </div>
             <div class="card-body">
                    <div class="img-big-wrap">
                            <div> <a href="#"><img src="/image/{{$post->images}}" alt="{{$post->images}}" style="width:400px; height: 300px;"></a></div>
                          </div>
                <h5>Post Title: {{$post->title}}</h5>
                <h5>Post Location: {{$post->location}}</h5>
                <h5>Post Body: {{$post->body}}</h5>
                <h5>Post Bathroom Number: {{$post->bathroom_no}}</h5>
                <h5>Post Bedroom Number: {{$post->bed_no}}</h5>
                <h5>Post Price: Php:{{$post->price}}.00</h5>
                <h5>Post Created At: {{$post->created_at}}</h5>
                <h5>Post Updated At: {{$post->updated_at}}</h5>
                
             </div>
         </div>
         <div class="card m-auto">
             <div class="card-header">User info</div>
         <div class="card-body">
            <h5>User Name: {{$user->name}}</h5>
            <h5>User Email: {{$user->email}}</h5>
            <h5>User Contact Number: {{$user->phone}}</h5>
            <div class="img-big-wrap">
                <div> <a href="#"><img src="/image/{{$user->valid_id}}" alt="{{$user->valid_id}}" style="width:400px; height: 300px;"></a></div>
              </div>
              <div class="img-big-wrap">
                <div> <a href="#"><img src="/image/{{$user->valid_id2}}" alt="{{$user->valid_id2}}" style="width:400px; height: 300px;"></a></div>
              </div>
            <h5>User Created At: {{$user->created_at}}</h5>
            <h5>User Updated At: {{$user->updated_at}}</h5>
        </div>
        </div>
        <div class="col-6 m-auto p-5">
            <a href="/admin/posts" class="btn btn-primary btn-block">back</a>      
        </div>
         
    </div>
@endsection
        
     
