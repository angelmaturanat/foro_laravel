<?php

namespace App\Http\Controllers;

use App\Post;
use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::with(['channel', 'user'])->orderBy('created_at', 'desc')->get();

      $channels = Channel::All();

      return view('Posts.index', compact('posts', 'channels'));
    }

    public function postChannel($slug){
      try {
        $channel = Channel::where('slug', $slug)->firstOrFail(['id']);
        $posts = Post::where('channel_id', $channel->id)
                      ->with(['channel', 'user'])
                      ->orderBy('created_at', 'desc')
                      ->get();

        $channels = Channel::All();

        return view('Posts.index', compact('posts', 'channels'));
      } catch (ModelNotFoundException $ex) {
        abort(404);
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = Channel::All();
        return view('Posts.create', compact('channels'));
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
          'title' => 'required',
          'body' => 'required',
          'channel_id' => 'required'
        ]);

        Post::create($request->All());

        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->channel_id = $request->input('channel_id');
        // $post->total_replies = 0;
        // $post->user_id = Auth::id();
        //
        // $post->save();

        return response()->redirectTo('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
