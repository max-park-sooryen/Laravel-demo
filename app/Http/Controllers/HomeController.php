<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PostRepository;

//require_once 'vendor/autoload.php';

class HomeController extends Controller
{
    private $postRepo;
    /**
     * Create a new controller instance.
     * @param PostRepository $postRepo
     * @return void
     */
    public function __construct(PostRepository $postRepo)
    {
        $this->middleware('auth');
        $this->postRepo = $postRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $email = $user['email'];

        //if post was created or edited
        if ($request->__isset('editOrNew')) {
            $postID = $request->__get('postID');
            $title = $request->__get('title');
            $body = $request->__get('body');
            // new post was created hence no postID in database yet
            if ($postID == -1) {
                $insertData = ['title' => $title, 'body' => $body, 'email' => $email];
                $this->postRepo->create($insertData);
            }
            // edit post in database
            else {
                $updateData = ['title' => $title, 'body' => $body];
                $this->postRepo->update($postID, $updateData);
            }
        }

        //if post is deleted
        if ($request->__isset('deleted')) {
            $this->postRepo->delete($request->__get('postID'));
        }
    
        $postsArr = $this->postRepo->all();

        //TODO: need to fix refresh adding new post if new post created
        return view('home', ['posts' => $postsArr, 'email' => $email]);
    }

    
}
