<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use App\Models\Programme;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('frontend.home')->with([
            "posts" => Post::take(3)->get(),
            "events" => Event::take(4)->get(),
            "members" => TeamMember::take(3)->get(),
            "programmes" => Programme::take(3)->get()
        ]);
    }

    public function blog()
    {
        return "blog";
    }

    public function blogDetail($id, $slug)
    {
        $post = Post::find($id);
        $popularPosts = Post::inRandomOrder()->take(3)->get();
        $categories = Category::inRandomOrder()->take(5)->get();
        return view('frontend.blog.blog-detail')->with([
            "post" => $post,
            "popularPosts" => $popularPosts,
            "categories" => $categories
        ]);
    }
}
