@extends('admin/admin')
@section('title', 'Product')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Product</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('storage/'.$product['image']) }}"
                                height="200" width="100%"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="category">Category</label>
                                    <input id="category" type="text" value="{{ $product->category['name'] }}" class="form-control" disabled />
                                </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" value="{{ $product['name'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type="text" value="{{ $product['price'] }}" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input id="sku" type="text" value="{{ $product['sku'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input id="status" type="text" value="{{ $product['status'] }}" class="form-control" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" type="text" value="{{ $product['description'] }}" class="form-control" disabled />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
