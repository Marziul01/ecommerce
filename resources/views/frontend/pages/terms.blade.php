@extends('frontend.master')

@section('title')
    {{ $siteSettings->title }} | Terms & Conditions
@endsection


@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Pages
                <span></span> Terms & Conditions
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                        <div class="single-header style-2">
                            <h2>Terms of Service</h2>
                        </div>
                        <div class="single-content">
                            {!! $terms->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJs')

@endsection
