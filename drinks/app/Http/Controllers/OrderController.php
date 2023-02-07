<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')
        ->get()
        ->map(function($drink) {
            $drink->drinks = json_decode($drink->order_json);
            return $drink;
        });
        return view('back.orders.index', ['orders' => $orders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // $order->status = 1;
        // $order->save();
        // $to = User::where('id', 'user_id')->get()[];
        // $to = User::where('id', 'user_id')->first();
        $to = User::find($order->user_id);
        Mail::to($to)->send(new OrderShipped($order));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if ($order->status == 0) {
            return redirect()->back()->with('not', 'You can not delete unfinished orders');
        }
        $order->delete();
        return redirect()->back();
    }
}
