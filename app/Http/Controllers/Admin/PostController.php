<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::orderByDesc('id')->paginate(9);

        $posts = Auth::user()->posts()->orderByDesc('id')->paginate(9);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // ddd($request->all());

        $validated_data = $request->validate([
            'title' => ['required', 'unique:posts', 'max:200'],
            'sub_title' => ['nullable'],
            'image' => ['nullable'],
            'body' => ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id']
        ]);

        $validated_data['slug'] = Str::slug($validated_data['title']);

        $validated_data['user_id'] = Auth::id();
        Post::create($validated_data);
        return redirect()->route('admin.posts.index')->with('feedback', 'Post succesfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        // return view('guest.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
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
        //
        
        $validated_data = $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id), 'max:200'],
            'sub_title' => ['nullable'],
            'image' => ['nullable'],
            'body' => ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id']
        ]);

        $validated_data['slug'] = Str::slug($validated_data['title']);
        $post->update($validated_data);
        return redirect()->route('admin.posts.index')->with('feedback', 'Post succesfully modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return redirect()->route('admin.posts.index')->with('feedback', 'post succesfully deleted');
    }
}
