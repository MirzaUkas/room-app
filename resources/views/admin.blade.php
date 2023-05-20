@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center gap-3">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard Admin') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{ __('Admin, You are logged in!') }}

                        <canvas id="transactionChart" height="100px"></canvas>
           
                    </div>
                </div>
            </div>

            {{-- Data Room --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Data Rooms') }}</div>

                    <div class="card-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <a class="btn btn-success ms-1 mt-3 mb-3 w-25" href="{{ route('rooms.create') }}"
                                enctype="multipart/form-data">
                                Add
                            </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Room Name</th>
                                    <th>Room Type</th>
                                    <th>Area</th>
                                    <th>Price</th>
                                    <th>Facility</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $room->id }}</td>
                                        <td>{{ $room->room_name }}</td>
                                        <td>{{ $room->roomType->room_type }}</td>
                                        <td>{{ $room->area }}</td>
                                        <td>{{ $room->price }}</td>
                                        <td>{{ $room->facility }}</td>
                                        <td>
                                            <form action="{{ route('rooms.destroy', $room->id) }}" method="Post">
                                                <a class="btn btn-primary"
                                                    href="{{ route('rooms.edit', $room->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Data Room Type --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Data Room Types') }}</div>

                    <div class="card-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <a class="btn btn-success ms-1 mt-3 mb-3 w-25" href="{{ route('room_types.create') }}"
                                enctype="multipart/form-data">
                                Add
                            </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Room Type</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roomTypes as $type)
                                    <tr>
                                        <td>{{ $type->id }}</td>
                                        <td>{{ $type->room_type }}</td>
                                        <td>
                                            <form action="{{ route('room_types.destroy', $type->id) }}" method="Post">
                                                <a class="btn btn-primary"
                                                    href="{{ route('room_types.edit', $type->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Data Transactions --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Data Transactions') }}</div>

                    <div class="card-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <a class="btn btn-success ms-1 mt-3 mb-3 w-25" href="{{ route('transactions.create') }}"
                                enctype="multipart/form-data">
                                Add
                            </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Trans Code</th>
                                    <th>Trans Date</th>
                                    <th>Cust Name</th>
                                    <th>Room Name</th>
                                    <th>Total Room Price</th>
                                    <th>Total Extra Charge</th>
                                    <th>Final Total</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $trans)
                                    <tr>
                                        <td>{{ $trans->transaction->id }}</td>
                                        <td>{{ $trans->transaction->trans_code }}</td>
                                        <td>{{ $trans->transaction->trans_date }}</td>
                                        <td>{{ $trans->transaction->cust_name }}</td>
                                        <td>{{ $trans->room->room_name }}</td>
                                        <td>{{ $trans->transaction->total_room_price }}</td>
                                        <td>{{ $trans->transaction->total_extra_charge }}</td>
                                        <td>{{ $trans->transaction->final_total }}</td>
                                        <td>
                                            <form action="{{ route('transactions.destroy', $trans->transaction->id) }}" method="Post">
                                                <a class="btn btn-primary"
                                                    href="{{ route('transactions.edit', $trans->transaction->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
    </div>
    <script type="text/javascript">
  
        var labels =  {{ Js::from($labels) }};
        var users =  {{ Js::from($data) }};
      
        const data = {
            labels: labels,
            datasets: [{
                label: 'Transaction Data',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: users,
            }]
        };
      
        const config = {
            type: 'line',
            data: data,
            options: {}
        };
      
        const transactionChart = new Chart(
            document.getElementById('transactionChart'),
            config
        );
      
    </script>
@endsection
