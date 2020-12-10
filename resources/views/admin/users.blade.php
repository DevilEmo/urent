@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-10 col-sm-10 col-md-4 ml-auto pt-5">
        <input type="text" name="search" id="search" class="form-control">
    </div>
    <div class="col-2 col-sm-2 col-md-1  pt-5 pb-2">
        <input type="submit" value="search" class="btn btn-primary">
    </div>
</div>
<div class="table-responsive">  
    <table class="table table-striped" style="background-color: whitesmoke;">
  <thead>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>TYPE</th><!--IF REGULAR OR PREMIUM TYPE-->
        <th>CERTIFICATION</th>
        <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
        @if(count($users)=="0")
        <h1>no user</h1>
        @else
        <div class="col-sm-9">
            <div class="row" id="postData">
                @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->usertype}}</td>
                    <td>{{$user->certified}}</td>
                    <td><form action="{{route('users.destroy',$user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/admin/user/{{$user->id}}"><i class="material-icons mx-2" style="font-size:28px;color: #3366ff;)">border_color</i></a>
                            <button type="submit" class="btn"><i class="material-icons" style="color:#cc0000;">delete_forever</i></button>
                        </form>
                    </td>
                  </tr>
              

                @endforeach
            </div>
        </div>
         {{$users->links()}}
        @endif
    
  </tbody>
</table>
</div>


@endsection