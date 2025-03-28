<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request){
        Product::create([
            'name'=>request('name'),
            'count'=>request('count'),
        ]);
    }
    public function index()
    {
        return Product::all();
    }
}
