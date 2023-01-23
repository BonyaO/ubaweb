@extends('frontend.layout.app')

@section('content')
    <x-banner prefix="Our" title="Blog" />
    <div class="container my-5">
<div class="row">
    @forelse($posts as $post)
    <div class="col-md-4">
        <div class="card mb-5"> 
        <img class="card-img-top" src="{{ $post->imageUrl() ?? 'https://picsum.photos/300'}}" alt="image">
        <div class="card-body p-25"> 
            <ul class="list-inline primary-color mb-3">
                <li><i class="fa fa-clock-o"></i> {{$post->created_at->format('d M, Y')}}</li>
            </ul>
          <h4 class="card-title mb-4"><a href="{{$post->url()}}">{{$post->title}}</a></h4>
          <p class="card-text">{{$post->summary}}</p> 
          <a class="btn btn-primary btn-round btn-sm" href="{{$post->url()}}"> Read More </a>
        </div>
        </div><!-- card -->    
</div>
    @empty
        <div>No posts at the moment</div>
    @endforelse
</div>
    </div>
@endsection
