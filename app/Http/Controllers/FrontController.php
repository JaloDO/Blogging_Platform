<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class FrontController extends Controller
{
    public function index()
  {
      return view('welcome');
  }

  public function showpost($slug)
  {
      $post = Post::where('slug', '=', $slug)->first();

      if(!$Post)
      abort(404);

      return view('viewpost', ['post' => $post]);
  }
}
