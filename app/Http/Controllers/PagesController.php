<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Department;
use App\Models\Event;
use App\Models\Opportunity;
use App\Models\Partner;
use App\Models\Post;
use App\Models\PressRelease;
use App\Models\Programme;
use App\Models\School;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('frontend.home')->with([
            'posts' => Post::where('is_published', true)->take(6)->get(),
            'events' => Event::take(4)->get(),
            'members' => TeamMember::take(6)->get(),
            'programmes' => Programme::with('department.school')->take(10)->get(),
            'partners' => Partner::take(10)->get(),
            'opportunities' => Opportunity::where('is_published', true)
                ->orderByRaw("status = 'open' desc")
                ->latest()
                ->take(6)
                ->get(),
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function pressRelease()
    {
        return view('frontend.press-release')->with([
            'pressReleases' => PressRelease::where('is_published', true)->latest()->get(),
        ]);
    }

    public function blog(Request $request)
    {
        $search = $request->query('search');
        $categoryId = $request->query('category');

        $posts = Post::query()
            ->where('is_published', true)
            ->when($categoryId, fn ($query) => $query->where('category_id', $categoryId))
            ->when($search, fn ($query) => $query->where(fn ($query) => $query
                ->where('title', 'like', "%{$search}%")
                ->orWhere('summary', 'like', "%{$search}%")))
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('frontend.blog.index')->with([
            'posts' => $posts,
            'categories' => Category::all(),
            'activeCategory' => $categoryId ? Category::find($categoryId) : null,
            'search' => $search,
        ]);
    }

    public function blogDetail($id, $slug)
    {
        $post = Post::where('is_published', true)->find($id);
        $popularPosts = Post::where('is_published', true)->inRandomOrder()->take(3)->get();
        $categories = Category::all();

        return view('frontend.blog.blog-detail')->with([
            'post' => $post,
            'popularPosts' => $popularPosts,
            'categories' => $categories,
        ]);
    }

    public function opportunityDetail($id, $slug)
    {
        $opportunity = Opportunity::where('is_published', true)->findOrFail($id);

        return view('frontend.opportunities.show', compact('opportunity'));
    }

    public function events()
    {
        $events = Event::latest()->get();

        return view('frontend.events.index', compact('events'));
    }

    public function eventDetail($id, $slug)
    {
        $event = Event::findOrFail($id);

        return view('frontend.events.show', compact('event'));
    }

    public function schoolDetail($id, string $slug)
    {
        $schools = School::latest()->get();
        $school = School::find($id);

        return view('frontend.schools.show', compact('school', 'schools'));
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

    public function contact()
    {
        return view('frontend.contact');
    }

    public function storeContactMessage(StoreContactMessageRequest $request)
    {
        ContactMessage::create($request->validated());

        return back()->with('success', 'Thank you for reaching out. We will get back to you shortly.');
    }
}
