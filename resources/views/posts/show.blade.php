@extends('layouts.app')
@section('content')
<style>
        .gallery-wrap .img-big-wrap img {
      height: 450px;
      width: auto;
      display: inline-block;
      cursor: zoom-in;
  }

  .gallery-wrap .img-small-wrap .item-gallery {
      width: 60px;
      height: 60px;
      border: 1px solid #ddd;
      margin: 7px 2px;
      display: inline-block;
      overflow: hidden;
  }
  
  .gallery-wrap .img-small-wrap {
      text-align: center;
  }
  .gallery-wrap .img-small-wrap img {
      max-width: 100%;
      max-height: 100%;
      object-fit: cover;
      border-radius: 4px;
      cursor: zoom-in;
  }
      </style>

      <div class="container">
           <div class="row">
            <aside class="col-sm-5 border-right">
        <article class="gallery-wrap"> 
            <div class="img-big-wrap">
                <div> <a href="#"><img src="../image/{{$post->images}}" style="width:100%; height: 80%;"></a></div>
              </div>
        </article> <!-- gallery-wrap .end// -->
            </aside>
            <aside class="col-sm-7">
        <article class="card-body p-5">
          <h3 class="title mb-3">{{$post->title}}</h3>
        
        <p class="price-detail-wrap"> 
          <span class="price h3 text-warning"> 
            <span class="currency">P</span><span class="num">{{$post->price}}</span>
          </span> 
        </p> <!-- price-detail-wrap .// -->
        <dl class="item-property">
          <dt>Description</dt>
          <dd><p>{{$post->body}}</p></dd>
        </dl>
        <dl class="param param-feature">
          <dt>Type:</dt>
          <dd>{{$post->unit_type}}</dd>
        </dl>  <!-- item-property-hor .// -->
        <dl class="item-property">
          <dt>Bed Number:</dt>
          <dd><p>{{$post->bed_no}}</p></dd>
        </dl>
        <dl class="item-property">
          <dt>Bathroom Number:</dt>
          <dd><p>{{$post->bathroom_no}}</p></dd>
        </dl>
        <hr>
        

    
        @if (!Auth::guest())
        @if ((Auth::user()->id == $post->user_id) ||  (Auth::user()->usertype === 'admin'))    
        <div class="row">
            <hr>
        <a href="/posts/{{$post->id}}/edit" class="btn btn-lg btn-outline-primary text-uppercase">edit</a>
        <form (action="{{route('posts.show',$post->id)}}") method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-lg btn-danger text-uppercase">Delete</button>
        </form>
        </div>
    
        @else

        <div class="row">
          <hr>
          <a href="/contact/{{$post->id}}" class="btn btn-lg btn-outline-primary text-uppercase">Message me </a>
          <a href="/posts" class="btn btn-lg btn-primary text-uppercase"> Back </a>
        </article> <!-- card-body.// -->
            </aside> <!-- col.// -->
          </div> <!-- row.// -->
        </div> <!-- card.// -->        
        
        @endif
    @endif
    @if (Auth::guest())
    <div class="row">
      <hr>
        <a href="/contact/{{$post->id}}" class="btn btn-lg btn-outline-primary text-uppercase">Message me </a>
        <a href="/posts" class="btn btn-lg btn-primary text-uppercase"> Back </a>
    </article> <!-- card-body.// -->
        </aside> <!-- col.// -->
      </div> <!-- row.// -->
    </div> <!-- card.// -->    
    @endif

    {{-- <div class="row m-auto">
  <div class="col-12 mb-3">
    <div class="card">
      <img src="../image/{{$post->images}}" alt="" style="height:50vh;">
      <h1 class="text-muted ml-3 pb-3">{{$post->location}}</h1>
    </div>
  </div>
  <div class="col-sm-8 col-md-8">
    <div class="card">
      <img src="../image/{{$post->images}}" class="card-img-top" alt="{{$post->images}}" style="height:40vh">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->body}}</p>
        <p class="card-text">Bed Number: {{$post->bed_no}}</p>
        <p class="card-text">Bathroom Number: {{$post->bathroom_no}}</p>
        <p class="card-text"><small class="text-muted">Last update: {{$post->updated_at}}</small></p>
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-md-4">
      <div class="card">
          <div class="card-body">
              <a class="btn btn-primary btn-block" href="/contact/{{$post->id}}">More details</a>
            <form action="/posts/contact" method="post">
              @csrf
              @method('POST')
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="message" class="form-control" placeholder="Your Name...">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="message" class="form-control" placeholder="Your Email...">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="3" name="message" class="form-control mb-3" placeholder="Your Message"></textarea>
                <input type="submit" value="Inbox landlord" class="btn btn-primary btn-block">
              </div>
            </form>
          </div>
        </div>
  </div>
  <div class="col-sm-8 col-md-8 pt-3 mb-3">
    <div class="card">
      <div class="card-body">
          <div class="form-group">
            <input type="text" name="" id="" class="form-control" placeholder="Leave some comments...">
          </div>
      </div>
    </div>
  </div>
</div>
     --}}
        @endsection
        
     
