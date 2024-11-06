<footer class="main">
{{--    <section class="newsletter p-30 text-white wow fadeIn animated">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-7 mb-md-3 mb-lg-0">--}}
{{--                    <div class="row align-items-center">--}}
{{--                        <div class="col flex-horizontal-center">--}}
{{--                            <img class="icon-email" src="{{ asset('frontend-assets') }}/imgs/theme/icons/icon-email.svg" alt="">--}}
{{--                            <h4 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col my-4 my-md-0 des">--}}
{{--                            <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>$25 coupon for first shopping.</strong></h5>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-5">--}}
{{--                    <!-- Subscribe Form -->--}}
{{--                    <form class="form-subcriber d-flex wow fadeIn animated">--}}
{{--                        <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">--}}
{{--                        <button class="btn bg-dark text-white" type="submit">Subscribe</button>--}}
{{--                    </form>--}}
{{--                    <!-- End Subscribe Form -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="section-padding footer-mid custom-footer">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="{{ route('home') }}"><img src="{{ asset($siteSettings->logo ) }}" alt="logo"></a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                        <p class="wow fadeIn animated">
                            <strong>Address: </strong>{{ $siteSettings->address }}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Phone: </strong>{{ $siteSettings->phone }}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Email: </strong>{{ $siteSettings->email }}
                        </p>
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            <a href="{{ $siteSettings->facebook }}"><img src="{{ asset('frontend-assets') }}/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                            <a href="{{ $siteSettings->twitter }}"><img src="{{ asset('frontend-assets') }}/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                            <a href="{{ $siteSettings->instagram }}"><img src="{{ asset('frontend-assets') }}/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                            <a href="{{ $siteSettings->youtube }}"><img src="{{ asset('frontend-assets') }}/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h5 class="widget-title wow fadeIn animated">About</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms_condition') }}">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-3">
                    <h5 class="widget-title wow fadeIn animated">My Account</h5>
                    <ul class="footer-list wow fadeIn animated">
                        <li><a href="{{ route('userAuth') }}">Sign In</a></li>
                        <li><a href="{{ route('user.profile') }}">My account</a></li>
                        <li><a href="{{ route('cart') }}">View Cart</a></li>
                        <li><a href="{{ route('wishlist') }}">My Wishlist</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="widget-title wow fadeIn animated">Install App</h5>
                    <div class="row">
                        <div class="col-md-8 col-lg-12">
                            <p class="wow fadeIn animated">From App Store or Google Play</p>
                            <div class="download-app wow fadeIn animated">
                                <a href="{{ $siteSettings->appStoreLink }}" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="{{ asset('frontend-assets') }}/imgs/theme/app-store.jpg" alt=""></a>
                                <a href="{{ $siteSettings->googleStoreLink }}" class="hover-up"><img src="{{ asset('frontend-assets') }}/imgs/theme/google-play.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                            <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                            <img class="wow fadeIn animated" src="{{ asset($siteSettings->paymentImage) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-20 wow fadeIn animated">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm text-muted mb-0">&copy; 2024, <strong class="text-brand">{{ $siteSettings->title }}</strong> </p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    {{-- Designed by <a href="http://marziul.com/" target="_blank">Marziul.com</a>. --}} All rights reserved. 
                </p>
            </div>
        </div>
    </div>
</footer>
