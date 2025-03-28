<?php

namespace App\Http\Controllers;

use App\Jobs\OrderJob;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request){
        Order::create([
            'product_id' => $request->input('product_id'),
            'count' => $request->input('count'),
        ]);
        OrderJob::dispatch($request->only(['product_id','count']));
    }
}
