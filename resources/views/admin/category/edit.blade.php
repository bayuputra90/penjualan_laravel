@extends('admin/admin')
@section('title','Category')
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ url('admin/category/'.$category['id']) }}">
                @csrf
                @method('put')

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Category</h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input type="text" name="name" value="{{ $category['name'] }}" class="form-control" placeholder="Enter category" />
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{ $category['status']=='active'?'selected':'' }}>Active</option>
                                <option value="inactive" {{ $category['status']=='inactive'?'selected':'' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer d-flex">
                        <a href="{{ url('admin/category') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary ml-auto">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
