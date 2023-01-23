    <footer>
        <div class="footer-top  has-color pt--120 pb--30">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget widget-company">
                            <a href="index.html" class="d-flex align-items-center">
                            <img src="{{asset('frontend/images/ubalogo.png')}}" class="img-fluid" style="max-width: 100%; height: 100px" alt="image">
                            <div class="pl-3">
                                <h4>The University of Bamenda</h4>
                                <span class="text-secondary">The University of the Future</span>
                            </div>
                            </a>
                            <div class="address">
                                <h6>Address</h6>
                                <p>{{setting('footer.address')}}</p>
                            </div>
                            <div class="address">
                                <h6>Phone Line 1</h6>
                                <p>{{setting('phone_line_1')}}</p>
                            </div>
                            <div class="address">
                                <h6>Phone line 2</h6>
                                <p>{{setting('phone_line_2')}}</p>
                            </div>
                            <ul class="social">
                                <li><a href="{{setting('facebook')}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{setting('twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{setting('instagram')}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget footer-link">
                            <h4 class="fwidget-title mb-5 pb-3 primary-color">Quick links</h4> 
                            <ul>
                                <li><a href="{{route('events')}}"><i class="fa fa-angle-right"></i>Events</a></li>
                                <li><a href="{{route('about')}}"><i class="fa fa-angle-right"></i>About us</a></li>
                                <li><a href="{{route('blog')}}"><i class="fa fa-angle-right"></i>Campus news</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget widget-opening">
                            <h4 class="fwidget-title mb-5 pb-3 primary-color">Admin area</h4>
                        
                            <div class="widget footer-link">
                                <ul>
                                    <li><a href="{{setting('webmail')}}" target="_blank"><i class="fa fa-angle-right"></i>Webmail</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>Copyright © {{now()->format('Y')}}, The University of Bamenda</p>
                </div>
            </div>
        </div>
    </footer>
