<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index (){
        $title = "Daftar Posting";
        $posts = Post::all();
        return view('posts.index', compact('posts', 'title'));
    }  
}
