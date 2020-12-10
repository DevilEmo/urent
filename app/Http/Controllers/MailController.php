<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Post;
use DB;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required',
            'post_title' => 'required',
            'landlord' => 'required',
           ]);

           $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'post_title' => $request->post_title,
            'landlord' => $request->landlord
        );
        Mail::to($data['landlord'])->send(new ContactMail($data));
        return back()->with('success', 'Your message has been sent!');
        
        // $to_name = $request->input('name');
        // $to_email = $request->input('email');
        // $body = $request->input('message');
        // Mail::send(new ContactMail($request));
        // return redirect('/posts');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
    public function show($id)
    {
        $post = Post::find($id);
        $data =[
            'post' => $post,
            'user' => $post->user
        ];
        return view('posts.contact')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
