@extends('frontend.layout.app')

@section('content')
<div class="blog-details-area ptb--120">
    <div class="container my-5">
    <nav aria-label="breadcrumb mt-3 bg-white">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">{{$programme->department->school->name}}</li>
        <li class="breadcrumb-item">{{$programme->department->name}}</li>
        <li class="breadcrumb-item">{{$programme->name}}</li>
      </ol>
    </nav>

    <h3>{{$programme->name}}</h3>
    <p>{{$programme->description}}</p>
    <p>Duration: {{$programme->duration}} years</p>
    @if($programme->show_fee)
    <p>Cost: {{$programme->fee}} XAF</p>
    @endif
    <h5>Prerequisite</h5>
    <div class="mb-3">
    {!! $programme->prerequisite !!}
    </div>

    <x-back-button />
    </div>
</div>
@endsection

