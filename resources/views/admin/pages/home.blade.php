@extends('admin.master')

@section('title')
    {{ $siteSettings->title }} | Home Page Settings
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('admin.auth.message')
            <div class="py-3">
                <h5 class="text-white text-center text-bg-primary p-2" style="border-radius: 5px"> HomePage Offers </h5>
            </div>
            <div class="col-md-6 ">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Popup Offer <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="On Reload Popup Offer"></i></h6>
                            </div>
                            <div>
                                @if($offer1->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collapseOffer">
                            <input type="hidden" name="id" value="{{ $offer1->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer1->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer1->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>SubTitle</label>
                                <input type="text" class="form-control" name="subtitle" value="{{ $offer1->subtitle }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer1->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $offer1->price }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Time</label>
                                <input type="date" class="form-control" name="offerTime" value="{{ $offer1->offerTime }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer1->offerLink }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                @if($offer1->status == 1)
                                    <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer1->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                @else
                                    <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer1->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                @endif
                            </div>
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 ">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header " style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer2">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Offer 2 <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="This Offer Section is after the Services Section"></i></h6>
                            </div>
                            <div>
                                @if($offer2->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collapseOffer2">
                            <input type="hidden" name="id" value="{{ $offer2->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer2->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer2->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer2->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer2->offerLink }}">
                            </div>
                            <div class="col-md-12 row mb-2">
                                <div class="col-md-6 mb-2">
                                    @if($offer2->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer2->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer2->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 py-3">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer3">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Offer 3 <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="This Offer Section is the First Offer of the 3 Offers Inline"></i></h6>
                            </div>
                            <div>
                                @if($offer3->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collapseOffer3">
                            <input type="hidden" name="id" value="{{ $offer3->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer3->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer3->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer3->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer3->offerLink }}">
                            </div>
                            <div class="col-md-12 row mb-2">
                                <div class="col-md-6 mb-2">
                                    @if($offer3->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer3->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer3->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 py-3">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer4">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Offer 4 <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="This Offer Section is the Second Offer of the 3 Offers Inline"></i></h6>
                            </div>
                            <div>
                                @if($offer4->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collpseOffer4">
                            <input type="hidden" name="id" value="{{ $offer4->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer4->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer4->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer4->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer4->offerLink }}">
                            </div>
                            <div class="col-md-12 row mb-2">
                                <div class="col-md-6 mb-2">
                                    @if($offer4->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer4->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer4->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer5">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Offer 5 <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="This Offer Section is the Third Offer of the 3 Offers Inline"></i></h6>
                            </div>
                            <div>
                                @if($offer5->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collapseOffer5">
                            <input type="hidden" name="id" value="{{ $offer5->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer5->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer5->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer5->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer5->offerLink }}">
                            </div>
                            <div class="col-md-12 row mb-2">
                                <div class="col-md-6 mb-2">
                                    @if($offer5->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer5->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer5->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer6">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Offer 6 <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="This Offer Section is the First Offer of the 2 Timeout Offers Inline after New Arrivals"></i></h6>
                            </div>
                            <div>
                                @if($offer6->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collapseOffer6">
                            <input type="hidden" name="id" value="{{ $offer6->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer6->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer6->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>SubTitle</label>
                                <input type="text" class="form-control" name="subtitle" value="{{ $offer6->subtitle }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer6->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $offer6->price }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Time</label>
                                <input type="date" class="form-control" name="offerTime" value="{{ $offer6->offerTime }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer6->offerLink }}">
                            </div>
                            <div class="col-md-12 row mb-2">
                                <div class="col-md-6 mb-2">
                                    @if($offer6->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer6->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer6->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 py-3">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer7">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Offer 7 <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="This Offer Section is the Second Offer of the 2 Timeout Offers Inline after New Arrivals"></i></h6>
                            </div>
                            <div>
                                @if($offer7->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collapseOffer7">
                            <input type="hidden" name="id" value="{{ $offer7->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer7->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer7->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>SubTitle</label>
                                <input type="text" class="form-control" name="subtitle" value="{{ $offer7->subtitle }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer7->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $offer7->price }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Time</label>
                                <input type="date" class="form-control" name="offerTime" value="{{ $offer7->offerTime }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer7->offerLink }}">
                            </div>
                            <div class="col-md-12 row mb-2">
                                <div class="col-md-6 mb-2">
                                    @if($offer7->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer7->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer7->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 py-3">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer8">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Offer 8 <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="This Offer Section is the Third Offer of the 3 Offers Inline"></i></h6>
                            </div>
                            <div>
                                @if($offer8->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collapseOffer8">
                            <input type="hidden" name="id" value="{{ $offer8->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer8->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer8->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer8->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer8->offerLink }}">
                            </div>
                            <div class="col-md-12 row mb-2">
                                <div class="col-md-6 mb-2">
                                    @if($offer8->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer8->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer8->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer9">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Offer 9 <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="This Offer Section is the Third Offer of the 3 Offers Inline"></i></h6>
                            </div>
                            <div>
                                @if($offer9->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collapseOffer9">
                            <input type="hidden" name="id" value="{{ $offer9->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer9->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer9->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer9->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer9->offerLink }}">
                            </div>
                            <div class="col-md-12 row mb-2">
                                <div class="col-md-6 mb-2">
                                    @if($offer9->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer9->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer9->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('offer-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer10">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">Offer 10 <i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="This Offer Section is the Third Offer of the 3 Offers Inline"></i></h6>
                            </div>
                            <div>
                                @if($offer10->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="collapseOffer10">
                            <input type="hidden" name="id" value="{{ $offer10->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($offer10->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $offer10->title }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $offer10->details }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Offer Link</label>
                                <input type="text" class="form-control" name="offerLink" value="{{ $offer10->offerLink }}">
                            </div>
                            <div class="col-md-12 row mb-2">
                                <div class="col-md-6 mb-2">
                                    @if($offer10->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('offer-show', $offer10->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('offer-show', $offer10->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3">
        <div class="row">
            <div class="py-3">
                <h5 class="text-white text-center text-bg-primary p-2" style="border-radius: 5px"> HomePage Sliders </h5>
            </div>
            <div class="col-md-12 ">
                <form action="{{ route('homeSetting-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#slider1">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px"> Slider 1</h6>
                            </div>
                            <div>
                                @if($homeSettings->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="slider1">
                            <input type="hidden" name="id" value="{{ $homeSettings->id }}">
                            <div class="col-md-4 mb-2">
                                <img src="{{ asset($homeSettings->image) }}" width="100%" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="col-md-12 mb-2">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $homeSettings->title }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>SubTitle</label>
                                    <input type="text" class="form-control" name="subtitle" value="{{ $homeSettings->subtitle }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Details</label>
                                    <input type="text" class="form-control" name="details" value="{{ $homeSettings->details }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Description </label>
                                    <input type="text" class="form-control" name="description" value="{{ $homeSettings->description }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Details Color (Color Code or Name)</label>
                                    <input type="text" class="form-control" name="detailsColor" value="{{ $homeSettings->detailsColor }}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="col-md-12 mb-2">
                                    <label>Other Texts Color (Color Code or Name)</label>
                                    <input type="text" class="form-control" name="color" value="{{ $homeSettings->color }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Button Text</label>
                                    <input type="text" class="form-control" name="offerText" value="{{ $homeSettings->offerText }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Button Link</label>
                                    <input type="text" class="form-control" name="offerLink" value="{{ $homeSettings->offerLink }}">
                                </div>
                                <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            @if($homeSettings->status == 1)
                                                <a class="btn btn-sm btn-warning" href="{{ route('homeSetting-show', $homeSettings->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                            @else
                                                <a class="btn btn-sm btn-success" href="{{ route('homeSetting-show', $homeSettings->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                        </div>
                                    </div>

                                </div>

                            </div>



                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 py-3">
                <form action="{{ route('homeSetting-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#slider2">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px"> Slider 2</h6>
                            </div>
                            <div>
                                @if($slider2->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="slider2">
                            <input type="hidden" name="id" value="{{ $slider2->id }}">
                            <div class="col-md-4 mb-2">
                                <img src="{{ asset($slider2->image) }}" width="100%" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="col-md-12 mb-2">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $slider2->title }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>SubTitle</label>
                                    <input type="text" class="form-control" name="subtitle" value="{{ $slider2->subtitle }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Details</label>
                                    <input type="text" class="form-control" name="details" value="{{ $slider2->details }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Description </label>
                                    <input type="text" class="form-control" name="description" value="{{ $slider2->description }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Details Color (Color Code or Name)</label>
                                    <input type="text" class="form-control" name="detailsColor" value="{{ $slider2->detailsColor }}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="col-md-12 mb-2">
                                    <label>Other Texts Color (Color Code or Name)</label>
                                    <input type="text" class="form-control" name="color" value="{{ $slider2->color }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Button Text</label>
                                    <input type="text" class="form-control" name="offerText" value="{{ $slider2->offerText }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Button Link</label>
                                    <input type="text" class="form-control" name="offerLink" value="{{ $slider2->offerLink }}">
                                </div>
                                <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            @if($slider2->status == 1)
                                                <a class="btn btn-sm btn-warning" href="{{ route('homeSetting-show', $slider2->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                            @else
                                                <a class="btn btn-sm btn-success" href="{{ route('homeSetting-show', $slider2->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                        </div>
                                    </div>

                                </div>

                            </div>



                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 ">
                <form action="{{ route('homeSetting-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#slider3">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px"> Slider 3</h6>
                            </div>
                            <div>
                                @if($slider3->status == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                        <div class="card-body row collapse" id="slider3">
                            <input type="hidden" name="id" value="{{ $slider3->id }}">
                            <div class="col-md-4 mb-2">
                                <img src="{{ asset($slider3->image) }}" width="100%" style="margin-bottom: 10px">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="col-md-12 mb-2">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $slider3->title }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>SubTitle</label>
                                    <input type="text" class="form-control" name="subtitle" value="{{ $slider3->subtitle }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Details</label>
                                    <input type="text" class="form-control" name="details" value="{{ $slider3->details }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Description </label>
                                    <input type="text" class="form-control" name="description" value="{{ $slider3->description }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Details Color (Color Code or Name)</label>
                                    <input type="text" class="form-control" name="detailsColor" value="{{ $slider3->detailsColor }}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="col-md-12 mb-2">
                                    <label>Other Texts Color (Color Code or Name)</label>
                                    <input type="text" class="form-control" name="color" value="{{ $slider3->color }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Button Text</label>
                                    <input type="text" class="form-control" name="offerText" value="{{ $slider3->offerText }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Button Link</label>
                                    <input type="text" class="form-control" name="offerLink" value="{{ $slider3->offerLink }}">
                                </div>
                                <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            @if($slider3->status == 1)
                                                <a class="btn btn-sm btn-warning" href="{{ route('homeSetting-show', $slider3->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                            @else
                                                <a class="btn btn-sm btn-success" href="{{ route('homeSetting-show', $slider3->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                        </div>
                                    </div>

                                </div>

                            </div>



                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="py-3">
                <h5 class="text-white text-center text-bg-primary p-2" style="border-radius: 5px"> HomePage Category </h5>
            </div>
            <div class="col-md-4">
                <form action="{{ route('homeSetting-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;">
                            <div class="w-75">
                                <h6 class="text-black" style="margin-bottom: 0px;"><i class="bi bi-1-circle-fill"></i> Select a Category which Products you want to show at first</h6>
                            </div>

                        </div>
                        <div class="card-body row">
                            <input type="hidden" name="id" value="{{ $category1->id }}">
                            <div class="col-md-12 mb-2">
                                <select class="form-control" name="firstCategory">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $category1->firstCategory ? 'selected' : '' }}>{{ $category->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                <div class="row">

                                    <div class="col-md-6 mb-2">
                                        <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ route('homeSetting-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;">
                            <div class="w-75">
                                <h6 class="text-black" style="margin-bottom: 0px;"><i class="bi bi-2-circle-fill"></i> Select a Category which Products you want to show at Second</h6>
                            </div>


                        </div>
                        <div class="card-body row">
                            <input type="hidden" name="id" value="{{ $category2->id }}">
                            <div class="col-md-12 mb-2">
                                <select class="form-control" name="secondCategory">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $category2->secondCategory ? 'selected' : '' }}>{{ $category->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                <div class="row">

                                    <div class="col-md-6 mb-2">
                                        <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ route('homeSetting-save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between;">
                            <div class="w-75">
                                <h6 class="text-black" style="margin-bottom: 0px;"><i class="bi bi-3-circle-fill"></i> Select a Category which Products you want to show at third</h6>
                            </div>

                        </div>
                        <div class="card-body row">
                            <input type="hidden" name="id" value="{{ $category3->id }}">
                            <div class="col-md-12 mb-2">
                                <select class="form-control" name="thirdCategory">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $category3->thirdCategory ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('customjs')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Initialize Bootstrap Tooltip
        $(document).ready(function(){
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
