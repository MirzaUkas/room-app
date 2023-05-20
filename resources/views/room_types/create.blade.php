@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Room Type') }}</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success mb-1 mt-1">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('room_types.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Room Type:</strong>
                                    <input type="text" name="room_type" class="form-control" placeholder="Room Type">
                                    @error('room_type')
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
