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
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" name="firstname" placeholder="First name" value="{{ old('firstname') }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="lastname" placeholder="Last name" value="{{ old('lastname') }}">
                        </div>
                        <div class="col-md-3">
                            <div class="fx-relay-email-input-wrapper"><input type="email" name="email" placeholder="Your Email" style="padding-right: 30px;" value="{{ old('email') }}"></div>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                        </div>
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="Your message here">{{ old('message') }}</textarea>
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
