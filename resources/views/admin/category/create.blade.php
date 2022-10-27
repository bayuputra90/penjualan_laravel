@extends('admin/admin')
@section('title','Category')
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ url('admin/category') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter category" />
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer d-flex">
                        <a href="{{ url('admin') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary ml-auto">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
