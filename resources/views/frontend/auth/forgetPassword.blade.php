@extends('frontend.master')

@section('title')
    {{ $siteSettings->title }} | Forget Password
@endsection

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Forget Password
            </div>
        </div>
    </div>
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    @include('frontend.auth.frontMessage')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="alert-ul">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Forget Password</h3>
                                    </div>
                                    <form method="post" action="{{ route('forgetResetLink') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required="" name="email" placeholder="Your Email">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Confirm</button>
                                        </div>
                                        <div class="login_footer form-group">
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('userAuth') }}">Login !!</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJs')

@endsection
