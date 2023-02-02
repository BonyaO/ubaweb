@extends('frontend.layout.app')

@section('content')
<x-banner prefix="Press" title="Releases" />
<div class="container py-5 my-5">
    <div class="row">
        @forelse($pressReleases as $pressRelease)
            <div class="col-md-6">
                <div class="media align-items-center mb-5">
                    <div class="media-head primary-bg">
                        <img src="{{$pressRelease->imageUrl()}}" class="img-fluid ml-3" alt="image">
                    </div>
                    <div class="media-body">
                        <span class="text-secondary small mb-1">Signed: {{$pressRelease->signed_on->format('d M, Y')}}</span>
                        <h4>{{$pressRelease->title}}</h4>
                        <p>{{$pressRelease->description}}</p>
                        <a href="{{$pressRelease->downloadUrl()}}" class="btn btn-sm btn-link text-primary py-2 px-0" download>{{__("Download")}}</a>
                    </div>
                </div> <!-- media -->
            </div><!-- col-md-6 -->
            @empty
            <h3>No press releases at the moment</h3>
        @endforelse
    </div>
</div>
@endsection

