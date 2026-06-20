@extends('frontend.layout.app')

@section('title', $opportunity->title)

@section('content')
<div class="blog-details-area ptb--120">
    <div class="container">
        <nav aria-label="breadcrumb mt-3 bg-white">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">{{$opportunity->title}}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-7">
                @if($opportunity->imageUrl())
                <img src="{{$opportunity->imageUrl()}}" alt="{{$opportunity->title}}" class="img-fluid mb-4">
                @endif

                <span class="uba-eyebrow">{{ucfirst($opportunity->type)}}</span>
                @if($opportunity->isOpen())
                    <span class="uba-opportunities__badge uba-opportunities__badge--static">Open now</span>
                @endif

                <h1 class="uba-section__title" style="text-align: left; font-size: 34px;">{{$opportunity->title}}</h1>

                <p class="lead">{{$opportunity->summary}}</p>

                @if($opportunity->detail)
                <div class="mt-4">
                    {!! $opportunity->detail !!}
                </div>
                @endif
            </div>

            <div class="col-md-5">
                <div class="uba-opportunities__sidebar">
                    @if($opportunity->deadline)
                        <span class="uba-meta d-block mb-3">Apply by {{$opportunity->deadline->format('d M, Y')}}</span>
                    @endif

                    <a href="{{$opportunity->ctaUrl()}}"
                        @if($opportunity->website) target="_blank" rel="noopener" @endif
                        class="btn btn-primary btn-round py-3 px-5">
                        {{$opportunity->website ? 'Apply now' : 'Contact us'}}
                    </a>
                </div>

                <div class="mt-4">
                    <x-back-button />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
