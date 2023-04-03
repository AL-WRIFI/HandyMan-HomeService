<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Handyman;
use App\Models\Service;
use App\Models\Order;
use App\Models\Rating;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected Handyman $handyman;
    protected Service $service;
    protected User $user;

    protected Order $order;
    protected Rating $rating;

    public function __construct(Handyman $handyman, Service $service, User $user, Order $order ,Rating $rating)
    {
        $this->handyman = $handyman;
        $this->service = $service;
        $this->user = $user;
        $this->order = $order;
        $this->rating = $rating;
    }

    public function dashboard(Request $request)
    {
        $data = [];
        //$user_data = $this->user->where(['user_id' => auth()->id()])->first();
        $data[] = ['top_cards' => [
            'totalorders' =>  $this->order->count(),
            'totalOrdersCompleted' =>$this->order->where('status', 'completed')->count(),
            'total_customer' => $this->user->count(),
            'total_handyman' => $this->handyman->where(['accepted' => 1])->count(),
            'total_services' => $this->service->count()
        ]];  
        //recent order
        $orders = $this->order->with('detail')
            ->take(5)->latest()->get();
        $data[] = ['orders' => $orders];

        //top Handyman
        $top_handymans = $this->handyman->take(5)->orderBy('avg_rating','DESC')->get();
        $data[] = ['top_handymans' => $top_handymans];
        $totalorders = $this->order->count();
        $data[] = ['totalorders' => $totalorders];
        $totalOrdersPending  = $this->order->where('status', 'pending')->latest()->get();
        $data[] = ['totalOrdersPending' => $totalOrdersPending];
        $totalOrdersCompleted  = $this->order->where('status', 'completed')->latest()->get();
        $data[] = ['totalOrdersCompleted' => $totalOrdersCompleted];

        return view('dashboard', compact('data'));

         //zone wise order data
        // $zoneMostOrder = $this->order
        //     ->with('serviceZone')
        //     //->whereMonth('created_at', now()->month)
        //     ->select('zone_id', DB::raw('count(*) as total'))
        //     ->groupBy('zone_id')
        //     ->get();
        // $data[] = ['zone_wise_bookings' => $zone_wise_bookings, 
        //            'total_count' => $this->booking->count()];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
