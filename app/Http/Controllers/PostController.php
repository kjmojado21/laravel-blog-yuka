<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $post;
    const LOCAL_STORAGE_FOLDER = 'public/images/';
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    public function index()
    {
        //

        $all_posts = $this->post->latest()->get();

        return view('posts.index')
            ->with('all_posts',$all_posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->post->user_id = Auth::user()->id;
        $this->post->title = $request->title;
        $this->post->description = $request->description;
        $this->post->image = $this->saveImage($request);
        $this->post->save();

        return redirect()->route('index');
    }
    public function saveImage($request){
        // we need to rename the file
        $image_name = time().".".$request->image->extension();
        #1706595479.jpeg
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);
        #public/images/1706595479.jpeg

        return $image_name;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
       $post =  $this->post->findOrFail($id);

       return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
