<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        return view('/posts');
    }

    public function landlord()
    {   
        
        $user_id = auth()->user()->id;
        // $account_type = DB::table('users')
        //                 ->select('account_type')
        //                 ->where('id',$user_id)
        //                 ->get();

        // $account_type = (string) $account_type;
        // dd($account_type);
        
        $user = User::find($user_id);
        $data = [
            'posts' => $user->posts
        ];
        return view('/landlord')->with($data);
    }

    public function admin()
    {  
        $users = User::orderBy('id','asc')->paginate(10);
        $posts = Post::orderBy('id','asc')->paginate(10);
        
        $data = [
            'users' => $users,
            'posts' => $posts
        ];
        
        return view('admin.adminposts')->with($data);
        
    }
}
