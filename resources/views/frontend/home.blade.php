@extends('frontend.layout.app')

@section('content')
@include('frontend/includes/hero')
    <div class="course-area  ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="section-title-style2 black-title title-tb text-center">
                        <span>build your career</span>
                        <h2 class="primary-color">Featured Programmes</h2>
                    </div>
                </div>
            </div>
  
            <div class="commn-carousel owl-carousel card-deck"> 
            @foreach($programmes as $programme)
                <div class="card mb-5">
                    @if($programme->show_fee)
                        <div class="course-thumb">
                            <img src="frontend/images/course/cs-img1.jpg" alt="image">
                            <span class="cs-price primary-bg">$150</span>
                        </div>
                    @endif
                    <div class="card-body  p-25"> 
                        <div class="course-meta-title mb-3">
                            <h4><a href="course-details.html">{{$programme->name}}</a></h4>
                        </div>
                        <p>{{$programme->description}}</p> 
                        <ul class="course-meta-details text-left w-100">
                            <li>
                             <p>Duration</p>
                              <span>{{$programme->duration}} year(s)</span>
                            </li>      
                        </ul>  
                  </div><!-- card-body -->
                </div><!-- card -->
                @endforeach
            </div> 
        </div>
    </div>
    <!-- course area end -->

    <!-- take toure area start -->
    <div class="take-toure-area ptb--120">
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
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="section-title-style2 black-title title-tb text-center">
                        <span>Learn from the best</span>
                        <h2 class="primary-color">Our teachers</h2>
                    </div>
                </div>
            </div>
            <div class="commn-carousel owl-carousel card-deck">   
              <div class="card mb-5"> 
                <img src="frontend/images/teacher/teacher-member1.jpg" alt="image"> 
                <div class="card-body teacher-content p-25">  
                  <h4 class="card-title mb-4"><a href="teacher-details.html">Patrick Garner Dony</a></h4>
                  <span class="primary-color d-block mb-4">Economist</span>
                  <p class="card-text">We’re a philosophical bunch here at School site and we have thought long and hard about.</p> 
                  <ul class="list-inline ">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                  </ul>
                </div>
              </div><!-- card -->    

              <div class="card mb-5"> 
                <img src="frontend/images/teacher/teacher-member2.jpg" alt="image"> 
                <div class="card-body teacher-content p-25">  
                  <h4 class="card-title mb-4"><a href="teacher-details.html">Cameron Brown</a></h4>
                  <span class="primary-color  d-block mb-4">Financier</span>
                  <p class="card-text">We’re a philosophical bunch here at School site and we have thought long and hard about.</p> 
                  <ul class="list-inline ">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                  </ul>
                </div>
              </div><!-- card -->    

              <div class="card mb-5"> 
                <img src="frontend/images/teacher/teacher-member3.jpg" alt="image"> 
                <div class="card-body teacher-content p-25">  
                  <h4 class="card-title mb-4"><a href="teacher-details.html">Joseph Mack Monika</a></h4>
                  <span class="primary-color d-block mb-4">Languages</span>
                  <p class="card-text">We’re a philosophical bunch here at School site and we have thought long and hard about.</p> 
                  <ul class="list-inline ">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                  </ul>
                </div>
              </div><!-- card -->  
              <div class="card mb-5"> 
                <img src="frontend/images/teacher/teacher-member4.jpg" alt="image"> 
                <div class="card-body teacher-content p-25">  
                  <h4 class="card-title mb-4"><a href="teacher-details.html">Patrick Garner Dony</a></h4>
                  <span class="primary-color d-block mb-4">Economist</span>
                  <p class="card-text">We’re a philosophical bunch here at School site and we have thought long and hard about.</p> 
                  <ul class="list-inline ">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                  </ul>
                </div>
              </div><!-- card -->         
            </div>
        </div>
    </div>
    <!-- course area end -->

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
                            <h4><a href="#">{{$event->name}}</a></h4>
                            <p>{{Str::words($event->description, 30)}}</p>
                        </div>
                    </div> <!-- media -->
                </div><!-- col-md-6 -->
            @endforeach
            </div><!-- row -->
        </div><!-- container -->
    </div>
    <!-- events area end --> 
    
    <div class="testimonial-area ptb--120"><!-- testimonial area start -->
        <img class="tst-bg" src="frontend/images/bg/tst-bg-shape.png" alt="image">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <div class="tst-carousel owl-carousel">
                        <div class="testimonial-content pb--40">
                            <div class="section-title sec-style-two">
                                <span class="text-uppercase primary-color mb-0">Happy students</span>
                                <h2>Testimonial</h2>
                            </div>
                            <h3>‘‘ Vous devez profiter de la vie. Toujours aimez, les personnespositives penser. ‘‘</h3>
                            <h4>Kawsar Ahhamed</h4>
                            <span>App Developer</span>
                        </div>  
                        <div class="testimonial-content pb--40">
                            <div class="section-title sec-style-two">
                                <span class="text-uppercase primary-color mb-0">Happy students</span>
                                <h2>Testimonial</h2>
                            </div>
                            <h3>‘‘ Vous devez profiter de la vie. Toujours aimez, les personnespositives penser. ‘‘</h3>
                            <h4>Kawsar Ahhamed</h4>
                            <span>App Developer</span>
                        </div>  
                        <div class="testimonial-content pb--40">
                            <div class="section-title sec-style-two">
                                <span class="text-uppercase primary-color mb-0">Happy students </span>
                                <h2>Testimonial</h2>
                            </div>
                            <h3>‘‘ Vous devez profiter de la vie. Toujours aimez, les personnespositives penser. ‘‘</h3>
                            <h4>Kawsar Ahhamed</h4>
                            <span>App Developer</span>
                        </div> 
                    </div>
                </div><!-- row -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- testimonial-area --> 

    <!-- blog area start -->
    <div class="feature-blog  ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="section-title-style2 black-title title-tb text-center">
                        <span>Top stories</span>
                        <h2>{{__('Campus News')}}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="blog-carousel owl-carousel card-deck">                     

                @foreach($posts as $post)
                  <div class="card mb-5"> 
                    <img class="card-img-top" src="frontend/images/blog/blog-thumbnail1.jpg" alt="image">
                    <div class="card-body p-25"> 
                        <ul class="list-inline primary-color mb-3">
                            <li><i class="fa fa-clock-o"></i> AUGUST 6, 2017</li>
                            <li><i class="fa fa-comments"></i> 3 Comments</li>
                        </ul>
                      <h4 class="card-title mb-4"><a href="{{$post->url()}}">{{$post->title}}</a></h4>
                      <p class="card-text">{{$post->summary}}</p> 
                      <a class="btn btn-primary btn-round btn-sm" href="{{$post->url()}}"> Read More </a>
                    </div>
                  </div><!-- card -->    
                @endforeach
       
                </div><!-- blog-carousel -->
            </div><!-- blog-carousel -->

        </div>
    </div> <!-- blog area end -->

    <!-- cta area start -->
    <div class="cta-area secondary-bg has-color cta-area ptb--50 "> 
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <div class="cta-content">
                        <p class="mb-2">Click to Join the Advance Workshop</p>
                        <h2>Training in advance networking</h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cta-btn">
                        <a class="btn btn-light btn-round" href="#">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cta area end -->
@endsection
