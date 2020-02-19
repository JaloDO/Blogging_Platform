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
        return view('home');
    }

    public function profile(){
        {
            $user = User::where('email', '=', Auth::user()->email)->first();
            $email = Auth::user()->email;
    
            return view('profile', ['user' => $user, 'email' => $email]);
        }
    }

    public function post(){
        //$allpost= Post::all();
        $allpost = DB::table('post')
            ->join('users', 'users.id', '=', 'post.author')
            ->select('users.name', 'post.*')
            ->where('author', '=',  Auth::user()->id)
            ->get();



        return view('post', compact('allpost', $allpost));
    }

    public function sortPost(){
        
        $allpost = DB::table('post')
            ->orderBy('publication_date', 'desc')
            ->get();

        return view('post', compact('allpost', $allpost));
    }
}
