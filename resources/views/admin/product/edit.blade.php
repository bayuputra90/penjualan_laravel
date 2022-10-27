@extends('admin/admin')
@section('title', 'Product')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('product.update', $product['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('storage/'.$product['image']) }}"
                                    height="200" width="100%"/>
                            </div>
                        </div>
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option>Choose Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}" {{ $product['id'] == $category['id'] ? 'selected' : '' }}>{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{ $product['name'] }}" class="form-control" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" value="{{ $product['price'] }}" class="form-control" placeholder="Enter price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sku">SKU</label>
                                    <input type="text" name="sku" id="sku" value="{{ $product['sku'] }}" class="form-control" placeholder="Enter SKU">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="active" {{ $product['status'] == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $product['status'] == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input id="description" type="text" name="description" value="{{ $product['description'] }}" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex">
                        <a href="{{ url('admin/product') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary ml-auto">Update Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
