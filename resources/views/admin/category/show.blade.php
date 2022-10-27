@extends('admin/admin')
@section('title','Category')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Category</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input id="name" type="text" value="{{ $category['name'] }}" class="form-control" disabled />
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input id="status" type="text" value="{{ $category['status'] }}" class="form-control" disabled />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
