@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col-sm-12 col-md-6 m-auto pt-5">
      <div class="card">
        <div class="card-header">
          <a href="/posts/{{$post->id}}" class="btn btn-primary"><-back</a>
        </div>
          <div class="card-body">
            <form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name...">
                {{-- <input type="hidden" name="landlordemail" id="message" class="form-control" value="{{$user->email}}"> --}}
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email...">
                
              </div>
              <div class="form-group">
                <textarea name="message" id="message" class="form-control mb-3" cols="30" rows="5" placeholder="Your message.."></textarea>
                <input type="hidden" name="post_title" id="message" class="form-control" value="{{$post->title}}">
                <input type="hidden" name="landlord" id="message" class="form-control" value="{{$user->email}}">
                <input type="submit" value="Inbox landlord" class="btn btn-primary btn-block">
              </div>
            </form>
          </div>
        </div>
  </div>

</div>
    
        @endsection
        
     
