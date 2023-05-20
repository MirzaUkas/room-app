@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Transaction') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success mb-1 mt-1">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Trans Code:</strong>
                                        <input type="text" name="trans_code" class="form-control"
                                            placeholder="Transaction Code" value="{{ $transaction->trans_code }}" disabled>
                                        @error('trans_code')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <strong>Trans Date:</strong>
                                    <input type="date" name="trans_date" class="form-control"
                                        placeholder="Transaction Date" value="{{ $transaction->trans_date }}">
                                    @error('trans_date')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <strong>Cust Name:</strong>
                                    <input type="text" name="cust_name" class="form-control" placeholder="Customer Name"
                                        value="{{ $transaction->cust_name }}">
                                    @error('cust_name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Total Room Price:</strong>
                                        <input type="number" name="total_room_price" class="form-control"
                                            placeholder="Total Room Price" value="{{ $transaction->total_room_price }}">
                                        @error('total_room_price')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Total Extra Charge:</strong>
                                        <input type="number" name="total_extra_charge" class="form-control"
                                            placeholder="Total Extra Charge"
                                            value="{{ $transaction->total_extra_charge }}">
                                        @error('total_extra_charge')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Final Total:</strong>
                                        <input type="number" name="final_total" class="form-control"
                                            placeholder="Final Total" value="{{ $transaction->final_total }}">
                                        @error('final_total')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
