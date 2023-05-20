<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::sortable();
        return view('admin.home', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all();
        return view('transaction.create', ['rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'trans_date' => 'required',
            'room_id' => 'required',
            'days' => 'required',
            'cust_name' => 'required',
            'extra_charge' => 'required',
            'extra_charge_quantity' => 'required',
        ]);
        $input = $request->all();
        $roomId = $input['room_id'];
        $selectedRoom = Room::where('id', $roomId)->firstOrFail();
        $totalRoomPrice = $selectedRoom->price * $input['days'];
        $totalExtraCharge = $input['extra_charge'] * $input['extra_charge_quantity'];
        $input['trans_code'] = "TR" . date('YmdHis');
        $input['total_extra_charge'] = $totalExtraCharge;
        $input['total_room_price'] = $totalRoomPrice;
        $input['final_total'] = $totalExtraCharge + $totalRoomPrice;
        $transaction = Transaction::create($input);


        $detail = new DetailTransaction;
        $detail->trans_id = $transaction->id;
        $detail->room_id = $roomId;
        $detail->days = $input['days'];
        $detail->sub_total_room = $selectedRoom->price;
        $detail->extra_charge = $input['extra_charge'];
        $detail->save();

        if(Auth::user()->is_admin){
            return redirect()->route('admin.home')->with('success', 'Transaction Has Been inserted successfully');
        }else{
            return redirect()->route('home')->with('success', 'Transaction Has Been inserted successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'trans_date' => 'required',
            'cust_name' => 'required',
            'total_room_price' => 'required',
            'total_extra_charge' => 'required',
            'final_total' => 'required',
        ]);
        $input = $request->all();
        $transaction->update($input);

        return redirect()->route('admin.home')->with('success', 'Transaction Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('admin.home')->with('success', 'Transaction Has Been deleted successfully');
    }
}