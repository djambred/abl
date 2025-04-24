<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {
        $client = $request->get('authenticated_client');

        // Now safe to use: $client->products()
        return response()->json($client->products()->get());
    }
}
