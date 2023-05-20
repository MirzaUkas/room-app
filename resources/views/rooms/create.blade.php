@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Room') }}</div>

                    <div class="card-body">
            
                        @if (session('status'))
                            <div class="alert alert-success mb-1 mt-1">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Room Name:</strong>
                                    <input type="text" name="room_name" class="form-control" placeholder="Room Name">
                                    @error('room_name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Room Type:</strong>
                                    <select class="form-control m-bot15" name="room_type_id" id="room_type_id">
                                        @if ($roomTypes->count() > 0)
                                            <option value="">Select Option</option>
                                            @foreach ($roomTypes as $type)
                                                <option value="{{ $type->id }}">{{ $type->room_type }}</option>
                                            @endForeach
                                        @else
                                            No Record Found
                                        @endif
                                    </select>
                                    @error('room_type_id')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <strong>Area:</strong>
                                <input type="text" name="area" class="form-control" placeholder="Area">
                                @error('area')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    <input type="number" name="price" class="form-control" placeholder="Price">
                                    @error('price')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Facility:</strong>
                                    <input type="text" name="facility" class="form-control" placeholder="Facility">
                                    @error('facility')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <a class="btn btn-primary ml-3 mt-3" href="{{ route('admin.home') }}">Back</a>
                            <button type="submit" class="btn btn-primary ml-3 mt-3">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
