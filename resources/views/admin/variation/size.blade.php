@extends('admin.master')

@section('title')
    Size Variation
@endsection

@section('content')

    <div class="container-fluid">
        @include('admin.auth.message')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="alert-ul">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sizes</h1>
            <a href="#" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#AddSizeModal">
                <i class="bi bi-file-earmark-plus"></i> Add New</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped table-responsive-md">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>size</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($variations->isNotEmpty())
                        @foreach($variations as $variation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $variation->size }}</td>
                                <td>
                                    @if($variation->status == 1)
                                        <i class="bi bi-check-circle-fill" style="color: deepskyblue"></i> ACTIVE
                                    @else
                                        <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                    @endif
                                </td>
                                <td class="table-action-td">
                                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#EditSizeModal_{{ $variation->id }}"><i class="bi bi-pen-fill"></i> Edit</a>
                                    @if($variation->status == 1)
                                        <a class="btn btn-sm btn-warning" href="{{ route('variations.show', $variation->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('variations.show', $variation->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                    @endif

                                    <form action="{{ route('variations.destroy', $variation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5"> No Sizes Found !!! </td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $variations->links() }}
            </div>
        </div>

    </div>




    {{--    Add Category Model--}}

    <div class="modal fade" id="AddSizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Add New Color
                </div>
                <div class="modal-body">
                    <form action="{{ route('variation.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label for="exampleInputEmail1">Size</label>
                                <input type="text" class="form-control" name="size">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--    Edit Category Model--}}
    @if(isset($variation))
        @foreach($variations as $variation)
            <div class="modal fade" id="EditSizeModal_{{ $variation->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <!-- Modal content goes here, make sure to customize it for each category -->
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            Edit Category
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('variation.updates', $variation->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label for="exampleInputEmail1">Color Name</label>
                                        <input type="text" class="form-control" value="{{ $variation->size }}" name="size">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--    <div class="modal fade" id="EditCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
        {{--         aria-hidden="true">--}}
        {{--        --}}
        {{--    </div>--}}
    @endif



@endsection

@section('customjs')

@endsection


