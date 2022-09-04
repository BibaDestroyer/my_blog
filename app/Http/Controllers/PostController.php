<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        $categories = Category::all();
        return view('post.posts', compact('posts', 'categories'));
    }

    public function show(Post $post){
        $tags = $post->tags()->get();
        $category = $post->category()->first();
        return view('post.show', compact('post', 'category', 'tags'));
    }

    public function edit(Post $post){
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function create(){
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(){
        $data = request()->validate([
            'title' => 'string|required|max:50',
            'content' => 'string|max:250',
            'category_id' => 'integer',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route('posts.index');
    }

    public function update(Post $post){
        $data = request()->validate([
            'title' => 'string|required|max:50',
            'content' => 'string|max:250',
            'category_id' => 'integer',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('posts.show', $post->id);
    }
}
