@extends('frontend.layout.app')

@section('content')
<div class="blog-details-area ptb--120">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
            <img src="{{$school->logo ?? 'https://picsum.photos/200'}}" 
                alt="logo" class="img-fluid img-thumbnail mb-5 ">
                @if($school->departments)
                <h5 class="mb-2">Departments</h5>
                <ul>
                    @foreach($school->departments as $department)
                        <li>
                            <p class="mb-0 font-weight-bold" style="text-decoration: underline"><a href="{{$department->departmentUrl()}}">{{$department->name}}</a></p>
                            <p class="small">{{$department->description}}</p>
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col-md-7">
            <img src="{{$school->image ?? 'https://picsum.photos/1200/600'}}" 
                alt="logo" class="img-fluid img-thumbnail mb-5">
                <h3>{{$school->name}}</h3>
                <p>{{$school->description}}</p>

                <h4>Mission Statement</h4>
                <div class="mb-4">
                    {!! $school->mission_statement !!}
                </div>

                @if(isset($school->website))
                    <a href="{{$school->website}}" target="_blank" class="btn btn-primary py-3 px-5" style="border-radius: 1000px">Visit website</a>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

