@extends('layouts.app')

@section('content')
        
        <div class="col-12">
            <table class="table table-striped">
            @if (count($posts)>0)
                <th><h1>Your Post</h1></th>
                <th></th>
                <th></th>
                <th></th>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td class="text-muted">{{$post->created_at}}</td>
                    <td class="text-muted">{{$post->updated_at}}</td>
                    <td class="text-muted"><a href="/posts/{{$post->id}}" class="btn btn-outline-primary">View your post</a></td>
                </tr>        
                @endforeach
            @else
                <th><h1>You don't have any post</h1></th>
                <th></th>
                <tr>
                    <td><a href="/posts/create" class="btn btn-primary btn-lg">Create post</a></td>
                </tr>
            @endif
            </table>
        </div>


    {{-- <chat-app :user="{{ auth()->user() }}"></chat-app> --}}
</div>

@endsection
