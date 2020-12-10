<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function gallery(){
        return view('pages.gallery');
    }
    // public function services(){
    //     $data = array(
    //         'services' => ['Front-end','Back-end','fullstack']
    //     );
    //     return view('pages.services')->with($data);
    // }
}
