<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
  {
    $allpost = DB::table('post')
    ->join('users', 'users.id', '=', 'post.author')
    ->select('users.name', 'post.*')
    ->get();

      return view('welcome', compact('allpost', $allpost));
  }

}
