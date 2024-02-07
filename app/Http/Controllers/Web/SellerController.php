<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /** Lista de sellers */
    public function index()
    {
        $sellers = Seller::all();

        return view('seller', [
            'sellers' => $sellers->toArray()
        ]);
    }
}
