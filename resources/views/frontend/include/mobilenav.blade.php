<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('home') }}"><img src="{{ asset($siteSettings->logo) }}" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <nav>
                            <ul class="mobile-menu">
                                @if($categories->isNotEmpty())
                                    @foreach($categories as $category)
                                <li class="menu-item-has-children">
                                    <span class="menu-expand"></span><a href="{{ route('categoryProduct',$category->slug) }}">{{ $category->name }}</a>
                                    @if($category->sub_category->isNotEmpty())
                                    <ul class="dropdown">
                                        @foreach($category->sub_category as $subCategory)
                                            <li><a href="{{ route('subCategoryProduct',$subCategory->slug) }}">{{ $subCategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                    @endforeach
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact us</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a  href="{{ $siteSettings->locationLink }}"> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ route('userAuth') }}">Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#">{{ $siteSettings->phone }} </a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="{{ $siteSettings->facebook }}"><img src="{{ asset('frontend-assets') }}/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                <a href="{{ $siteSettings->twitter }}"><img src="{{ asset('frontend-assets') }}/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                <a href="{{ $siteSettings->instagram }}"><img src="{{ asset('frontend-assets') }}/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                <a href="{{ $siteSettings->youtube }}"><img src="{{ asset('frontend-assets') }}/imgs/theme/icons/icon-youtube.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
