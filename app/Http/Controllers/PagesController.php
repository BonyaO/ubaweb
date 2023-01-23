<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Programme;
use App\Models\School;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('frontend.home')->with([
            "posts" => Post::take(6)->get(),
            "events" => Event::take(4)->get(),
            "members" => TeamMember::take(6)->get(),
            "programmes" => Programme::take(6)->get(),
            "partners" => Partner::take(10)->get()
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function blog()
    {
        return view('frontend.blog.index')->with([
            'posts' => Post::all()
        ]);
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

    public function events()
    {
        $events = Event::latest()->get();
        return view('frontend.events.index', compact('events'));
    }

    public function eventDetail($id, $slug)
    {
        $event = Event::findOrFail($id);
        return view('frontend.events.show', compact("event"));
    }

    public function schoolDetail($id, string $slug)
    {
        $schools = School::latest()->get();
        $school = School::find($id);
        return view('frontend.schools.show', compact("school", "schools"));
    }

    public function departmentDetail($school, $id, $slug)
    {
        $department = Department::findOrFail($id);
        return view('frontend.departments.show')->withDepartment($department); 
    }

    public function programmeDetail($school, $department, $programmeId)
    {
        $programme = Programme::findOrFail($programmeId);
        return view('frontend.programmes.show')->withProgramme($programme); 
    }

    public function contact() {
        return view('frontend.contact');
    }
}
