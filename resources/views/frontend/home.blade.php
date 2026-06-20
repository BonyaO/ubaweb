@extends('frontend.layout.app')

@section('content')
    @include('frontend/includes/hero')

    
    <div class="feature-blog ptb--120">
        <div class="container">
            <div class="uba-section__head">
                <span class="uba-eyebrow">Top stories</span>
                <h2 class="uba-section__title">{{__('Campus News')}}</h2>
                <span class="uba-rule"></span>
            </div>

            @if($posts->isNotEmpty())
            <div class="uba-news__grid">
                <article class="uba-news__feature">
                    <a href="{{$posts->first()->url()}}" class="uba-news__feature-media">
                        <img src="{{$posts->first()->imageUrl() ?? 'https://picsum.photos/800/500'}}" alt="" loading="lazy">
                    </a>
                    <div class="uba-news__feature-body">
                        <span class="uba-meta">{{$posts->first()->created_at->format('d M, Y')}}</span>
                        <h3><a href="{{$posts->first()->url()}}">{{$posts->first()->title}}</a></h3>
                        <p>{{$posts->first()->summary}}</p>
                        <a class="uba-link" href="{{$posts->first()->url()}}">Read more &rarr;</a>
                    </div>
                </article>

                <div class="uba-news__list">
                    @foreach($posts->skip(1) as $post)
                    <article class="uba-news__row">
                        <span class="uba-meta">{{$post->created_at->format('d M, Y')}}</span>
                        <h4><a href="{{$post->url()}}">{{$post->title}}</a></h4>
                    </article>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div> <!-- blog area end -->

    @if($opportunities->isNotEmpty())
    <div class="uba-opportunities ptb--120">
        <div class="container">
            <div class="uba-section__head">
                <span class="uba-eyebrow">Funding &amp; Scholarships</span>
                <h2 class="uba-section__title">Grants, Projects &amp; Scholarships</h2>
                <span class="uba-rule"></span>
            </div>

            <div class="uba-opportunities__layout">
                @php $featured = $opportunities->first(); $remaining = $opportunities->skip(1); @endphp

                <div class="uba-opportunities__feature @if($featured->isOpen()) uba-opportunities__feature--open @endif">
                    <a href="{{$featured->detailUrl()}}" class="uba-opportunities__card-link" aria-label="{{$featured->title}}"></a>
                    @if($featured->isOpen())
                        <span class="uba-opportunities__badge">Open now</span>
                    @endif
                    @if($featured->imageUrl())
                    <div class="uba-opportunities__feature-media">
                        <img src="{{$featured->imageUrl()}}" alt="" loading="lazy">
                    </div>
                    @endif
                    <div class="uba-opportunities__feature-body">
                        <span class="uba-eyebrow uba-eyebrow--small">{{ucfirst($featured->type)}}</span>
                        <h3>{{$featured->title}}</h3>
                        <p>{{Str::limit($featured->summary, 200)}}</p>
                        @if($featured->deadline)
                            <span class="uba-meta">Apply by {{$featured->deadline->format('d M, Y')}}</span>
                        @endif
                        <div class="uba-opportunities__actions">
                            <span class="uba-link">Learn more &rarr;</span>
                            @if($featured->website)
                            <a href="{{$featured->website}}" target="_blank" rel="noopener" class="btn btn-primary btn-round btn-sm">Apply now</a>
                            @endif
                        </div>
                    </div>
                </div>

                @if($remaining->isNotEmpty())
                <div class="uba-opportunities__grid">
                    @foreach($remaining as $opportunity)
                    <div class="uba-opportunities__card @if($opportunity->isOpen()) uba-opportunities__card--open @endif">
                        <a href="{{$opportunity->detailUrl()}}" class="uba-opportunities__card-link" aria-label="{{$opportunity->title}}"></a>
                        @if($opportunity->isOpen())
                            <span class="uba-opportunities__badge">Open now</span>
                        @endif
                        @if($opportunity->imageUrl())
                        <div class="uba-opportunities__card-media">
                            <img src="{{$opportunity->imageUrl()}}" alt="" loading="lazy">
                        </div>
                        @endif
                        <div class="uba-opportunities__card-body">
                            <span class="uba-eyebrow uba-eyebrow--small">{{ucfirst($opportunity->type)}}</span>
                            <h4>{{$opportunity->title}}</h4>
                            <p>{{Str::limit($opportunity->summary, 110)}}</p>
                            @if($opportunity->deadline)
                                <span class="uba-meta">Apply by {{$opportunity->deadline->format('d M, Y')}}</span>
                            @endif
                            <div class="uba-opportunities__actions">
                                <span class="uba-link">Learn more &rarr;</span>
                                @if($opportunity->website)
                                <a href="{{$opportunity->website}}" target="_blank" rel="noopener" class="btn btn-primary btn-round btn-sm">Apply</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif


    <div class="course-area ptb--120">
        <div class="container">
            <div class="uba-section__head">
                <span class="uba-eyebrow">Build your career</span>
                <h2 class="uba-section__title">Featured Programmes</h2>
                <span class="uba-rule"></span>
            </div>

            <div class="uba-catalog__grid">
            @foreach($programmes as $programme)
                <a href="{{$programme->programmeUrl()}}" class="uba-catalog__row">
                    <span class="uba-eyebrow uba-eyebrow--small">{{$programme->department?->school?->short_name ?? $programme->department?->name}}</span>
                    <h4>{{$programme->name}}</h4>
                    <span class="uba-catalog__meta">
                        {{$programme->duration}} yr{{$programme->duration > 1 ? 's' : ''}}
                        @if($programme->show_fee)
                            &middot; {{number_format($programme->fee)}} XAF
                        @endif
                    </span>
                </a>
            @endforeach
            </div>
        </div>
    </div>
    <!-- course area end -->

    <!-- take toure area start -->
    {{-- TODO: Remove d-none when video is present --}}
    <div class="take-toure-area ptb--120 d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="section-title-style2 white-title text-center">
                        <span>Take A Look</span>
                        <h2>Video Tour on Edification </h2>
                    </div>
                </div>
            </div>
            <div class="video-area">
                <a class="expand-video" href="https://www.youtube.com/watch?v=cdfMgotGKIM"><i class="fa fa-play"></i></a>
            </div>
        </div>
    </div>
    <!-- take toure area end -->

    <!-- course area start -->
    <div class="teacher-area pb--100">
        <div class="container">
            <div class="uba-section__head">
                <span class="uba-eyebrow">Central Administration</span>
                <h2 class="uba-section__title">The Core Team</h2>
                <span class="uba-rule"></span>
            </div>
            <div class="uba-roster__grid">
                @foreach($members as $member)
                <div class="uba-roster__card">
                    <div class="uba-roster__photo">
                        <img src="{{$member->imageUrl()}}" alt="{{$member->name}}" loading="lazy">
                    </div>
                    <h4>{{$member->name}}</h4>
                    <span class="uba-roster__role">{{$member->position}}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- core team area end -->

    <!-- events area start -->
    <div class="event-area  pt--120 pb--80">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="section-title-style2 black-title text-center">
                        <span>Join with us</span>
                        <h2>Upcoming Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($events as $event)
                <div class="col-md-6">
                    <div class="media align-items-center mb-5">
                        <div class="media-head primary-bg">
                            <span><sub>{{$event->start_date->format('M')}}</sub>{{$event->start_date->format('d')}}</span>
                            <p>{{$event->start_date->format('Y')}}</p>
                        </div>
                        <div class="media-body">
                            <h4><a href="{{$event->eventUrl()}}">{{$event->name}}</a></h4>
                            <p>{{Str::words($event->description, 30)}}</p>
                        </div>
                    </div> <!-- media -->
                </div><!-- col-md-6 -->
            @endforeach
            </div><!-- row -->
        </div><!-- container -->
    </div>

    <!-- cta area start -->
    <div class="cta-area secondary-bg has-color cta-area ptb--50 ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <div class="cta-content">
                        <p class="mb-2">Find the best programme tailored for you</p>
                        <h2>Get registered today</h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cta-btn">
                        <a class="btn btn-light btn-round" href="https://ubastudent.online/admission" target="_blank">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cta area end -->
@endsection
