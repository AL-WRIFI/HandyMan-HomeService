<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request['status'] = $request['status'] ?? 'pending';

        $query_param = [];
        //dd($request['status']);
        //$order = new Order;
        $orders =Order::where('status',$request['status'])->paginate();
        // $orders1 =Order::with(['user','provider'])
        //     ->when($request->has('search'), function ($query) use ($request) {
        //         $query->where(
        //             function ($query) use ($request) {

        //                     $keys = explode(' ', $request['search']);
        //                     foreach ($keys as $key) {
        //                         $query->orWhere('id', 'LIKE', '%' . $key . '%');
        //                     }

        //                 }
        //         );
        //     })->when($order_status != 'all', function ($query) use ($order_status) {
        //     $query->Order_status($order_status);
        // })->paginate();

        return view('admin.Order.list', compact('orders', 'query_param'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details(Order $order)
    {

        return view('admin.Order.details', compact('order'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
