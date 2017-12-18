<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')
            ->with('title', Setting::first())
            ->with('categories', Category::take(5)->get())
            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first());
    }

    public function singlePost($slug)
    {

        $post = Post::where('slug', $slug)->first();

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('single-post')
            ->with('title', Setting::first())
            ->with('categories', Category::take(5)->get())
            ->with('single_post', $post)
            ->with('next', Post::find($next_id))
            ->with('prev', Post::find($prev_id));
    }

    public function category($id){
        $category = Category::find($id);

        return view('category')
            ->with('title', Setting::first())
            ->with('name', $category->name)
            ->with('posts', $category->posts)
            ->with('categories', Category::take(5)->get());
    }

    public function tag($id){
        $tag = Tag::find($id);

        return view('tag')
            ->with('title', Setting::first())
            ->with('name', $tag->tag)
            ->with('posts', $tag->posts)
            ->with('categories', Category::take(5)->get());
    }
}
