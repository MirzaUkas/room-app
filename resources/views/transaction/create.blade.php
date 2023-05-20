@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Transaction') }}</div>
    
                    <div class="card-body">
    
                        @if (session('success'))
                            <div class="alert alert-success mb-1 mt-1">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                
    
                            <div class="form-group">
                                <strong>Trans Date:</strong>
                                <input type="date" name="trans_date" class="form-control" placeholder="Transaction Date">
                                @error('trans_date')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Room:</strong>
                                    <select class="form-control m-bot15" name="room_id">
                                        @if ($rooms->count() > 0)
                                            <option value="">Select Option</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                            @endForeach
                                        @else
                                            No Record Found
                                        @endif
                                    </select>
                                    @error('room_id')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Customer Name:</strong>
                                    <input type="text" name="cust_name" class="form-control"
                                        placeholder="Name">
                                    @error('cust_name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Days:</strong>
                                    <input type="number" name="days" class="form-control"
                                        placeholder="Days">
                                    @error('days')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Extra Charge:</strong>
                                    <select class="form-control m-bot15" name="extra_charge" id="room_type_id">
                                        <option value="">Select Option</option>
                                        <option value="20000">Minuman soda</option>
                                        <option value="15000">Air Putih</option>
                                        <option value="15000">Jasa Laundry</option>
                                        <option value="25000">Snack</option>
                                    </select>
                                    @error('extra_charge')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Extra Charge Quantity:</strong>
                                    <input type="number" name="extra_charge_quantity" class="form-control"
                                        placeholder="Quantity">
                                    @error('extra_charge_quantity')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
          
                            <button type="submit" class="btn btn-primary ml-3 mt-3">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
