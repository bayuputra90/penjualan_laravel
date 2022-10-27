@extends('admin/admin')
@section('title', 'Transactions')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Transaction</h3>

                    <div class="card-tools">
                        <a href="{{ url('admin/trx/create') }}" class="btn btn-tool"><i class="fa fa-plus"></i> &nbsp; Import</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                    <div id="alert-msg" class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('message') }}
                    </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td class="text-center">{{ $transaction['id'] }}</td>
                                <td>{{ $transaction->product['name'] }}</td>
                                <td class="text-center">{{ $transaction['trx_date'] }}</td>
                                <td class="text-center">{{ $transaction['price'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
