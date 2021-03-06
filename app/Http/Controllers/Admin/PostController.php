<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCreateRequest;
use App\Model\Admin\Post;
use App\Model\Admin\Tag;
use App\Model\Admin\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $posts = Post::all();

       return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        $tags= Tag::all();
        
        return view('admin.post.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        try {

        $post = new Post;

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->posted_by = 1;

        if($request->status)
        $post->status = 1;

        $post->save();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
       
       }
       catch(Exception $e) {

       return $e->getMessage();
      
       }


        return redirect()->route('post.create')->with('success', 'Post has been created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();

        $tags= Tag::all();

        return view('admin.post.edit',compact('post', 'categories','tags'));
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
        $post = POST::find($id);

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->posted_by = 1;

        if($request->status)
        $post->status = 1;

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        $post->save();

         return redirect()->route('post.index')->with('success', 'Post has been edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        $post->categories()->detach();

        $post->delete();

        return redirect()->route('post.index')->with('success', 'post has been deleted successfully');
    }
}
