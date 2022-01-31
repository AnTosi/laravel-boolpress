<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
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
            'image' => ['nullable', 'image', 'max:500'],
            'body' => ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        if ($request->file('image')) {
            $image_path = $request->file('image')->store('post_images');
            $validated_data['image'] = $image_path;
        }

        // ddd($image_path, $validated_data); 

        // ddd($validated_data);
        // ddd($request->tags);

        $validated_data['slug'] = Str::slug($validated_data['title']);

        $validated_data['user_id'] = Auth::id();
 
        $_post = Post::create($validated_data);
        if($request->has('tags')) {
            $request->validate([
                'tags'=> ['nullable', 'exists:tags,id']
            ]);
        }
        $_post->tags()->attach($request->tags);
        

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
        $tags = Tag::all();

        if(Auth::id() === $post->user_id) {
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        }

        else {
            abort(403);
        }
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
        if(Auth::id() === $post->user_id) {
            $validated_data = $request->validate([
                'title' => ['required', Rule::unique('posts')->ignore($post->id), 'max:200'],
                'sub_title' => ['nullable'],
                'image' => ['nullable', 'image', 'max:500'],
                'body' => ['nullable'],
                'category_id' => ['nullable', 'exists:categories,id'],  
            ]);

            if ($request->file('image')) {
                Storage::delete($post->image);
                $image_path = $request->file('image')->store('post_images');
                $validated_data['image'] = $image_path;
            }

            $validated_data['slug'] = Str::slug($validated_data['title']);

            $post->update($validated_data);
            if($request->has('tags')){
                $request->validate([
                    'tags' => ['nullable', 'exists:tags,id']
                ]);
                $post->tags()->sync($request->tags);
            }
            return redirect()->route('admin.posts.index')->with('feedback', 'Post succesfully modified');    
        }

        else {
            abort(403);
        }
        
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
        if(Auth::id() === $post->user_id) {
            Storage::delete($post->image);
            $post->delete();
    
            return redirect()->route('admin.posts.index')->with('feedback', 'post succesfully deleted');            
        }

        else {
            abort(403);
        }
    }
}
