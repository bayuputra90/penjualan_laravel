@extends('admin/admin')
@section('title', 'Product')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <a href="{{ route('product.create') }}" class="btn btn-tool"><i class="fa fa-plus"></i>&nbsp;Add</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                    <div id="alert-msg" class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">All Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}" {{ $cat_id == $category['id']? "selected" : "" }}>{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="search">Search</label>
                            <input type="text" name="search" id="search" value="{{ $keyword }}" class="form-control" placeholder="Enter keyword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>SKU</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $product['id'] }}</td>
                                        <td>{{ $product->category['name'] }}</td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['price'] }}</td>
                                        <td>{{ $product['sku'] }}</td>
                                        <td class="text-center"><img src="{{ asset('storage/'.$product['image']) }}" width="100"/></td>
                                        <td class="text-center">{{ ucfirst($product['status']) }}</td>
                                        <td class="text-center">
                                            <form method="POST" action="{{ URL::to('/admin/product/'.$product['id']) }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="{{ URL::to('/admin/product/'.$product['id']) }}"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-success" href="{{ URL::to('/admin/product/'.$product['id'].'/edit') }}"><i class="fa fa-pencil-alt"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    {{ $products->appends($_GET)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function (){
            $('#category').on('change', function() {
                filter();
            });

            $('#search').keypress(function(event){
                if (event.keyCode == 13){
                    filter();
                }
            });

            function filter() {
                var cat_id = $('#category').val();
                var keyword = $('#search').val();

                window.location.replace("{{ url('admin/product') }}?cat_id=" + cat_id + "&keyword=" + keyword);
            }
        });
    </script>
@endsection
