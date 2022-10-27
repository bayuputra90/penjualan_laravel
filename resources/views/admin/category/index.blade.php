@extends('admin/admin')
@section('title','Category')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories</h3>

                    <div class="card-tools">
                        <a href="{{ url('admin/category/create') }}" class="btn btn-tool">
                            <i class="fa fa-plus"></i>&nbsp; Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session('message'))
                    <div id="alert-msg" class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session('message') }}
                    </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{ $category['id'] }}</td>
                                <td>{{ $category['name'] }}</td>
                                <td class="text-center">{{ ucfirst($category['status']) }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ url('/admin/category/'.$category['id']) }}">
                                        @csrf
                                        @method('delete')
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="{{ url('/admin/category/'.$category['id']) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-success" href="{{ url('/admin/category/'.$category['id'].'/edit') }}">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
