@extends('admin.master')

@section('title')
    Products
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                @include('admin.auth.message')
                <div class="d-sm-flex align-items-center justify-content-between mb-2">
                    
                        <h1>Products</h1>
                    
                    
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
                    
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped table-responsive-md" style="overflow-x: auto;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Brand</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($products->isNotEmpty())
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset( $product->featured_image ) }}" width="50px" height="50px"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>@if(isset($product->subCategory->name)){{ $product->subCategory->name }}@else No Subcategory Selected @endif</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->is_featured }}</td>
                                    <td>
                                        @if($product->status == 1)
                                            <i class="bi bi-check-circle-fill" style="color: deepskyblue"></i> ACTIVE
                                        @else
                                            <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                        @endif
                                    </td>
                                    <td class="table-action-td">
                                        <a class="btn btn-sm btn-primary" href="{{ route('product.edit', $product->id) }}"><i class="bi bi-pen-fill"></i></a>
                                        @if($product->status == 1)
                                            <a class="btn btn-sm btn-warning" href="{{ route('product.show', $product->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                        @else
                                            <a class="btn btn-sm btn-success" href="{{ route('product.show', $product->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                        @endif

                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#productViewModal_{{ $product->id }}"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="13"> No Products Found !!! </td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $products->links() }}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    @if(isset($product))
        @foreach($products as $product)
            <div class="modal fade" id="productViewModal_{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <!-- Modal content goes here, make sure to customize it for each category -->
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>{{ $product->name }}</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset($product->featured_image) }}" height="100px" class="mb-2">
                                    <p>Slug: {{ $product->slug }}</p>
                                    <p>Featured: {{ $product->is_featured }}</p>
                                    <p>Status: {{ $product->status == 1 ? 'ACTIVE' : 'INACTIVE'}}</p>
                                    <p>Quantity: {{ $product->qty}}</p>
                                    <p>Product SKU: {{ $product->sku}}</p>
                                    <p>Product Barcode: {{ $product->barcode}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Category: {{ $product->category->name }}</p>
                                    <p>Sub Category: {{ $product->Subcategory->name }}</p>
                                    <p>Brand: {{ $product->brand->name }}</p>
                                    <p>Discount Price: {{ $product->price }}</p>
                                    <p style="text-decoration: line-through">Price: {{ $product->compare_price }}</p>
                                    <p>Available Colors: {{ $product->colors }}</p>
                                    <p>Available Sizes: {{ $product->sizes }}</p>
                                    <p>Short Description:</p>
                                    <textarea class="form-control" readonly>{{ $product->short_desc }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <p>Full Description:</p>
                                    <textarea class="form-control" readonly> {!! $product->full_desc !!} </textarea>
                                </div>
                            </div>
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

