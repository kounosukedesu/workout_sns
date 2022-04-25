<?php

namespace App\Http\Controllers;

use App\Post;
use App\Workout;
use App\User;
use App\Like;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Post $post, Workout $workout)
    {
        return view('posts/index') -> with(['posts' => $post -> getPeginateByLimit(), 'workouts' => $workout -> get()]);
    }   
    
    public function show(Post $post, Workout $workout)
    { 
        $user = $post -> user() ->first();
        return view('posts/show') -> with(['post' => $post, 'user' => $user, 'workouts' =>$workout->get()]);
    }
    public function create(Workout $workout)
    {
        return view('posts/create') -> with(['workouts' => $workout -> get()]);
    }
    public function store(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $input_workouts = $request -> workouts_array;
        $user_id = Auth::id();
        $post -> user_id = $user_id;
        
        // 画像保存処理
        if($request->file('image1')) {
        $image1 = $request->file('image1');
        $path = Storage::disk('s3')->put('/', $image1, 'public');
        $post->image1 = Storage::disk('s3')->url($path);;
        }
        if($request->file('image2')) {
        $image2 = $request->file('image2');
        $path = Storage::disk('s3')->put('/', $image2, 'public');
        $post->image2 = Storage::disk('s3')->url($path);;
        }
        if($request->file('image3')) {
        $image3 = $request->file('image3');
        $path = Storage::disk('s3')->put('/', $image3, 'public');
        $post->image3 = Storage::disk('s3')->url($path);;
        }
        
        $post -> fill($input_post) -> save();
        $post -> workouts() -> attach($input_workouts);
        return redirect('/');
    }
    public function __construct()
    {
        $this->middleware(['auth', 'verified']) -> only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        Like::create([
            'user_id' => Auth::id(),
            'post_id' => $id,
        ]);

        session() -> flash('success', 'You Liked the Post');
        
        return redirect() -> back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like -> delete();
        
        session() -> flash('success', 'You Unliked the Post');
        
        return redirect() -> back();
    }
    
     public function profile(Post $post, Workout $workout)
    {
        $auth = Auth::user()->id;
        $user = User::where('id', $auth)->get();
        $posts = Post::where('user_id', $auth)->get();
        return view('posts/profile') -> with(['posts' => $posts, 'workouts' => $workout->get()]);
    }
    
    public function json_profile(Post $post, Workout $workout){
        $posts = Post::where('user_id', Auth::id())->get();
        $array = [];
        $number = count($posts);
        for($i = 0 ; $i < $number; $i++){
            array_push($array, $posts[$i]->workouts()->first());
        }
        return response()->json([
            'posts' => $posts,
            'workouts' => $array
            ]);
    }
   
}
