<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function register(Request $request)
    {
        Customers::create([
            'customer_name' => $request->customer_name,
            'location' => $request->location,
            'number' => $request->phone,
        ]);
    }
}
