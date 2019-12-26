<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     * @param PostRepository $post
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
    public function index(Request $request)
    {
        //if editing get title, body and postID from request
        $title = $request->input('postTitle');
        $body = $request->input('postBody');
        $postID = $request->input('postID');
        if (!$postID) {
            $postID = -1;
        }
        return view('post', ['title' => $title, 'body' => $body, 'postID' => $postID]);
    }

}