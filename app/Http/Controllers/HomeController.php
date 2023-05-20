<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = Room::all();
        return view('home', ['rooms' => $rooms]);
    }
    public function admin()
    {
        $rooms = Room::all();
        $roomTypes = RoomType::all();
        $transactions = DetailTransaction::all();
        $transactionChart = Transaction::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trans_date) as month_name"))
                    ->whereYear('trans_date', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
        $labels = $transactionChart->keys();
        $data = $transactionChart->values();
        return view('admin', ['rooms' => $rooms, 'roomTypes' => $roomTypes, 'transactions' => $transactions, 'labels' => $labels, 'data' => $data]);
    }
}