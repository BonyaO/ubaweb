@extends('frontend.layout.app')

@section('content')
    <x-banner prefix="Our" title="Blog" />
    <div class="blog-area ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    @if ($search || $activeCategory)
                        <p class="mb-4">
                            Showing results
                            @if ($search) for "<strong>{{ $search }}</strong>" @endif
                            @if ($activeCategory) in category "<strong>{{ $activeCategory->name }}</strong>" @endif
                            &mdash; <a href="{{ route('blog') }}">clear filters</a>
                        </p>
                    @endif
                    <div class="row">
                        @forelse ($posts as $post)
                            <div class="col-md-6">
                                <div class="card mb-5">
                                    <img class="card-img-top" src="{{ $post->imageUrl() ?? 'https://picsum.photos/300' }}" alt="image">
                                    <div class="card-body p-25">
                                        <ul class="list-inline primary-color mb-3">
                                            <li><i class="fa fa-clock-o"></i> {{ $post->created_at->format('d M, Y') }}</li>
                                        </ul>
                                        <h4 class="card-title mb-4"><a href="{{ $post->url() }}">{{ $post->title }}</a></h4>
                                        <p class="card-text">{{ $post->summary }}</p>
                                        <a class="btn btn-primary btn-round btn-sm" href="{{ $post->url() }}"> Read More </a>
                                    </div>
                                </div><!-- card -->
                            </div>
                        @empty
                            <div class="col-12">No posts found.</div>
                        @endforelse
                    </div>
                    <div id="pagination">
                        {{ $posts->links() }}
                    </div>
                </div>

                <!-- sidebar start -->
                <div class="col-lg-4 col-md-4">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <h4 class="widget-title">Search</h4>
                            <form action="{{ route('blog') }}" method="GET">
                                <input type="text" name="search" value="{{ $search }}" placeholder="Search...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget-category">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('blog', ['category' => $category->id]) }}" @class(['active' => $activeCategory?->id === $category->id])>
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- sidebar end -->
            </div>
        </div>
    </div>
@endsection
