@extends('frontend.layout.app')

@section('content')
    <x-banner prefix="Contact" title="Us" />
    <div class="contact-info ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="cnt-info">
                        <h4>Contact Info</h4>
                        <p>{{setting('footer.address')}}</p>
                        <ul class="address">
                            <li><i class="fa fa-phone"></i>{{setting('phone_line_1')}}</li>
                            <li><i class="fa fa-phone"></i>{{setting('phone_line_2')}}</li>
                            <li><i class="fa fa-envelope"></i>{{setting('email')}}</li>
                        </ul>

                        <ul class="social list-inline mt-5">
                            <li><a href="{{setting('facebook')}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{setting('twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{setting('instagram')}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3967.878860183047!2d10.2571228!3d6.0113671!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105f3f8068027257%3A0x35cfcde9af5981bc!2sAdvanced+Teachers'+Training+College+Annex+of+Bambili+(ENSAB)!5e0!3m2!1sen!2scm!4v1565099498122!5m2!1sen!2scm" style="border: 1px" allowfullscreen="" width="100%" height="540" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form-area pb--120">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="cnt-title">
                        <h4>Get in touch <span>with us</span></h4>
                        <p>We will be happy to hear from you</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="name" placeholder="Enter your name">
                        </div>
                        <div class="col-md-4">
                            <div class="fx-relay-email-input-wrapper"><input type="email" name="email" placeholder="Your Email" style="padding-right: 30px;"><div class="fx-relay-icon" style="top: 0px; bottom: 20px;"><button class="fx-relay-button" id="fx-relay-button" type="button" title="Generate new mask" style="background-image: url(&quot;moz-extension://82e6bf4b-7902-4e5e-93f4-de9b2f1cfb36/images/logo-image-fx-relay.svg&quot;);"></button></div></div>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="subject" placeholder="Subject">
                        </div>
                        <div class="col-12">
                            <textarea name="msg" id="msg" placeholder="Your message here"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit">SEND TO US</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
