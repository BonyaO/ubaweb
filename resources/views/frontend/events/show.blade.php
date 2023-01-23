@extends('frontend.layout.app')

@section('content')
<div class="blog-details-area ptb--120">
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-5">
                <h5 class="mb-2">Info</h5>
                <ul>
                    <li>
                        <p class="mb-0"><strong>Start date:</strong> {{$event->start_date->format('d M, Y')}}</p>
                        <p class="mb-0"><strong>End date:</strong> {{$event->end_date->format('d M, Y')}}</p>
                        <p class="small">{{$event->description}}</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
                <h4>{{$event->name}}</h4>
                <div class="mb-4">
                    {!! $event->detail !!}
                </div>
                <x-back-button />
            </div>
        </div>
    </div>
</div>
@endsection

