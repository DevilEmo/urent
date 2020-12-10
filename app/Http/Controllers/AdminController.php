<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function showpost($id)
     {
         $post = Post::find($id);
         
         $data = [
            'user' => $post->user,
            'post' => $post
        ];
        return view('admin.showpost')->with($data);

     }
     public function showuser($id)
     {
         $user = User::find($id);
         return view('admin.showuser')->with('user', $user);
     }

    public function users()
    {
        $users = User::orderBy('id','asc')->paginate(10);
        return view('admin.users')->with('users', $users);
    }

    public function posts()
    {  
        $posts = Post::orderBy('id','asc')->paginate(10);
        return view('admin.posts')->with('posts', $posts);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateusercertification(Request $request, $id)
    {
        $this->validate($request,[
            'certified' => 'required',
        ]);
        
        $post = User::find($id);
        $post->certified = $request->input('certified');
        $post->save();

        return redirect('/admin/users')->with('success','User certified');

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
        return redirect('/admin/posts')->with('success','post deleted');
    }
}
