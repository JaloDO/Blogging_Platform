<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\UserLike;
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
        return view('welcome');
    }

    public function profile(){
        {
            $user = User::where('email', '=', Auth::user()->email)->first();
            $email = Auth::user()->email;
    
            return view('profile', ['user' => $user, 'email' => $email]);
        }
    }

    public function post(){
        $allpost = DB::table('post')
            ->join('users', 'users.id', '=', 'post.author')
            ->select('users.name', 'post.*', 
                DB::raw("(select count(*) from users_likes where post = post.id) as num"))
            ->get();

        

        return view('post', compact('allpost', $allpost));
    }

    public function myPost(){
        $allpost = DB::table('post')
            ->join('users', 'users.id', '=', 'post.author')
            ->select('users.name', 'post.*')
            ->where('author', '=',  Auth::user()->id)
            ->get();
        return view('mypost', compact('allpost', $allpost));
    }
    public function numLikes($id){
        $num = DB::table('users_likes')
            ->select('count(*)')
            ->where('post','=',$id)
            ->get();
        return $num;
    }


    public function sortPost($field){
        
        $allpost = DB::table('post')
            ->orderBy($field, 'desc')
            ->get();

        return view('home', compact('allpost', $allpost));
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title   = $request->title;
        $post->description  = $request->description;
        $post->author = $request->author;
        $post->publication_date = DateTime();
        $post->like = 0;
        $post->save();

        return redirect('/home/post');
    }

    public function liked($id){
        //primero, consulta para ver si está en la BD
        $userLikePost = DB::table('users_likes')
            ->where([
                ['user', '=', Auth::user()->id],
                ['post', '=', $id],
            ])
            ->get();

        if(!$userLikePost->count()){
            //no se ha encontrado like de usuario para ese post 
            // insert
            $user_like = new UserLike();
            $user_like->user = Auth::user()->id;
            $user_like->post = $id;
            DB::table('users_likes')->insert(
                array('user' => $user_like->user, 'post' => $id)
            );

            //update
            
            DB::table('post')
                ->where('id', $id)
                ->increment('likes');
        }
        else{
            //si se ha encontrado
            //update likes, delete from users_likes where id
            DB::table('post')
                ->where('id',$id)
                ->increment('likes');
            

        }
        return redirect('/home');
    }
}
