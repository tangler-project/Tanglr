<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


//custom namespaces
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //prevent not logged in users from accessing the page
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Post::with('user')->with('group')->with('votes')->get();

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
        $this->validate($request,Post::$rules);
        $post = new Post();
        // dd($request->group());
        $post->owner_id = $request->user()->id;
        $post->group_id = $request->group_id;

        $post->img_url= $request->get('img_url');

        $post->content= $request->get('input');
        $post->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::with('user')->with('group')->with('votes')->where('group_id', $id)->get();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        //return a view... or redirect somewhere
    }
    //after login
    public function home(){
        return view('home');   
    }
    //login
    public function welcome(){    
        return view('welcome');
    }

    public function setVotes(Request $request){
        
        $vote = Vote::with('post')->firstOrCreate([
            'post_id' => $request->get('id'),
            'user_id' => $request->user()->id
        ]);
        $vote->vote = $request->get('vote');
        $vote->save();
        
        $post = $vote->post;
        $post->vote_score = $post->voteScore();

        $post->likes = $post->upvotes->count();
        $post->dislikes = $post->downvotes->count();
        
        $post->save();
        
        
    }

    public function getVotes($id){
        $post = Post::findOrFail($id);
        $arr = [];
        $arr []= $post->upvotes->count();
        $arr []= $post->downvotes->count();

        return $arr;
    }


}
