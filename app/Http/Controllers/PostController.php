<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Categorias;

use App\Models\Tag;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.delete')->only('destroy');
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'))->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorias::where('status', 1)->pluck('name', 'id');
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Post::$rules);

        $input = $request->all();
        $slug = strtolower($input['name']);
        $slugFinal = str_replace(' ', '-', $slug);
        $input['slug'] = $slugFinal;

        $path = 'img/posts/';

        if (isset($input['img'])) {
            $file = $input['img'];
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $input['img']->getClientOriginalExtension();
            $input["img"] = $fileNameToStore;
            $file->move($path, $fileNameToStore);
        }

        $post =  Post::create($input);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('posts.index')->with('success', 'Post creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Categorias::pluck('name', 'id');
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'name' => 'required',
                // 'slug'=> 'required',
                'status' => 'required|in:1,2',
            ]
        );

        $input = $request->all();
        $slug = strtolower($input['name']);
        $slugFinal = str_replace(' ', '-', $slug);
        $input['slug'] = $slugFinal;

        $path = 'img/posts/';

        if (isset($input['img'])) {
            $file = $input['img'];
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $input['img']->getClientOriginalExtension();
            $input["img"] = $fileNameToStore;
            $file->move($path, $fileNameToStore);

            // Eliminar la imagen antigua si existe
            if ($post->img && file_exists($path . $post->img)) {
                unlink($path . $post->img);
            }
        }

        $post->update($input);

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('posts.index')->with('success', 'Post actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Eliminar la imagen del post
        if ($post->img && file_exists(public_path('img/posts/' . $post->img))) {
            unlink(public_path('img/posts/' . $post->img));
        }

        $post->delete();

        return redirect()->route('posts.index')->with('info', 'el Post se elimino con exito');
    }
}
