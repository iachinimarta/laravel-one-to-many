<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('admin.posts.index', ['postRecuperati' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required|max:65535'
        ]);

        $data = $request->all();

        $newPost = new Post();
        $newPost->fill($data);

        $slug = Str::slug($newPost->title, '-');      
        $checkSlug = Post::where('slug', $slug)->first();
        $counter = 1;

        while($checkSlug) {
            $slug = Str::slug($newPost->title . '-' . $counter, '-');
            $counter++;
            $checkSlug = Post::where('slug', $slug)->first();
        };

        $newPost->slug = $slug;

        $newPost->save();

        return redirect()->route('admin.posts.index')->with('status', 'Post creato con successo!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', ['post' => $post] );
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
        return view('admin.posts.edit', ['post' => $post] );
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
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required|max:65535'
        ]);

        $data = $request->all();

        $updatedPost = Post::find($id);

        if($updatedPost->title !== $data['title']) {
            $slug = Str::slug($data['title'], '-');      
            $checkSlug = Post::where('slug', $slug)->first();
            $counter = 1;

            while($checkSlug) {
                $slug = Str::slug($data['title'] . '-' . $counter, '-');
                $counter++;
                $checkSlug = Post::where('slug', $slug)->first();
            };

            $data['slug'] = $slug;
        }

        $updatedPost->update($data);

        return redirect()->route('admin.posts.index')->with('status', 'Post modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedPost = Post::find($id);

        $deletedPost->delete();
        return redirect()->route('admin.posts.index')->with('status', 'Post eliminato con successo!');
    }
}
