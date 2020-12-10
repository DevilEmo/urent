<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;

class PostsController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Request $request)
    {
        $data = Post::filter($request)->orderBy('created_at','desc')->get();
        return view('posts.index')->with('data',$data);

    }
 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        
        $user = User::find($user_id);
        $data = [
            'posts' => $user->posts,
            'user' => $user
        ];
        return view('posts.create')->with($data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'location' => 'required',
            'bed_no' => 'required',
            'bathroom_no' => 'required',
            'price' => 'required',
            'unit_type' => 'required',
            'body' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->images->getClientOriginalExtension();
        request()->images->move(public_path('image'), $imageName);
        //return request()->all();
        $post = new post;
        $post->title = $request->input('title');
        $post->location = $request->input('location');
        $post->bed_no = $request->input('bed_no');
        $post->bathroom_no = $request->input('bathroom_no');
        $post->price = $request->input('price'); 
        $post->unit_type = $request->input('unit_type');
        $post->body = $request->input('body');
        $post->images = $imageName;
        $post->user_id = auth()->user()->id;
        $duplicate = Post::where('title',$post->title)
                        ->where('location',$post->location)
                        ->where('bed_no',$post->bed_no )
                        ->where('bathroom_no',$post->bathroom_no)
                        ->where('price',$post->price)
                        ->where('unit_type',$post->unit_type)
                        ->where('body',$post->body)
                        ->first();
        if ($duplicate) {
            return redirect('/posts')->with('error','post existed');
        }else{
            $post->save();
            return redirect('/posts')->with('success','post created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show')->with('post', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        //check for correct user
        if (auth()->user()->id !== $posts->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        return view('posts.edit')->with('post', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'location' => 'required',
            'bed_no' => 'required',
            'bathroom_no' => 'required',
            'price' => 'required',
            'unit_type' => 'required',
            'body' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->images->getClientOriginalExtension();
        request()->images->move(public_path('image'), $imageName);
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->location = $request->input('location');
        $post->bed_no = $request->input('bed_no');
        $post->bathroom_no = $request->input('bathroom_no');
        $post->price = $request->input('price');
        $post->unit_type = $request->input('unit_type');
        $post->body = $request->input('body');
        $post->images = $imageName;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success','post upadated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::find($id)->delete();
        return redirect('/posts')->with('success','post deleted');
    }
}
