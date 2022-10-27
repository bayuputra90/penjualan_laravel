@extends('admin/admin')
@section('title','Transaction')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ url('admin/trx/import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Import Excel</h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="excel">File Excel</label>
                            <input type="file" name="excel" id="excel" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer d-flex">
                        <a href="{{ URL::to('admin/trx') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary ml-auto">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
