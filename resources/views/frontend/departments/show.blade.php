@extends('frontend.layout.app')

@section('content')
<div class="blog-details-area ptb--120">
    <div class="container my-5">
<nav aria-label="breadcrumb mt-3 bg-white">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">{{$department->school->name}}</li>
    <li class="breadcrumb-item">{{$department->name}}</li>
  </ol>
</nav>

        <div class="row">
            <div class="col-md-5">
            {{-- <img src="{{$school->logo ?? 'https://picsum.photos/200'}}"  --}}
            {{--     alt="logo" class="img-fluid img-thumbnail mb-5 "> --}}
                @if($department->programmes)
                <h5 class="mb-2">Programmes</h5>
                <ul>
                    @foreach($department->programmes as $programme)
                        <li>
                            <p class="mb-0 font-weight-bold" style="text-decoration: underline"><a href="{{$programme->programmeUrl()}}">{{$programme->name}}</a></p>
                            <p class="small">{{$programme->description}}</p>
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col-md-7">
            {{-- <img src="{{$department->image ?? 'https://picsum.photos/1200/600'}}"  --}}
            {{--     alt="logo" class="img-fluid img-thumbnail mb-5"> --}}
                <h3>{{$department->name}}</h3>
                <p>{{$department->description}}</p>

                <h4>Info</h4>
                <div class="mb-4">
                    {!! $department->description !!}
                </div>

                @if(isset($department->website))
                    <a href="{{$department->website}}" target="_blank" class="btn btn-primary py-3 px-5" style="border-radius: 1000px">Visit website</a>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

