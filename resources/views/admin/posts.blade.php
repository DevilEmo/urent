@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-10 col-sm-10 col-md-4 ml-auto pt-5">
<form action="/admin" method="POST">
        @csrf
        @method('GET')
            <input type="text" name="location" id="search" class="form-control">
        </div>
        <div class="col-2 col-sm-2 col-md-1  pt-5 pb-2">
            <input type="submit" value="search" class="btn btn-primary">
        </div>
</form>
    </div>
<div class="table-responsive">  
    <table class="table table-striped" style="background-color: whitesmoke;">
  <thead>
    <tr>
      <th>ID</th>
      <th>Location</th>
      <th>Title</th>
      <th>Bed no.</th>
      <th>Bathroom no.</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
        @if(count($posts)=="0")
        <h1>No Post</h1>
        @else
        <div class="col-sm-9">
            <div class="row" id="postData">
                @foreach ($posts as $post)
                    <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->location}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->bed_no}}</td>
                            <td>{{$post->bathroom_no}}</td>
                            <td>
                                <a href="/admin/post/{{$post->id}}"><i class="material-icons mx-2" style="font-size:28px;color: #3366ff;)">border_color</i></a>
                                                            </td>
                            <td> 
                                <form action="/admin/delete/{{$post->id}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn"><i class="material-icons" style="font-size:28px;color:#cc0000;">delete_forever</i></button>
                              </form>
                            </td>
                        </tr>

                        {{-- modal view --}}
                  
                @endforeach
                
            </div>
        </div>
         {{$posts->links()}}
        @endif
    
  </tbody>
</table>
</div>

@endsection