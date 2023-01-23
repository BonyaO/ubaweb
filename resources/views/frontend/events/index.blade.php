@extends('frontend.layout.app')

@section('content')
<x-banner prefix="Up coming" title="Events" />
<div class="container py-5 my-5">
<div class="row">
            @forelse($events as $event)
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
                @empty
                <h3>No events at the moment</h3>
            @endforelse

</div>
</div>
@endsection

