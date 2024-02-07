<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{

    /** Service container */
    public function store(Request $request) {

        /** Manipular a request */
        $sellerName = $request->input('name');
        $sellerEmail = $request->input('email');

        /** Operação no banco de dados | Por meio de model */
        $createdSeller = Seller::create([
            'name' => $sellerName,
            'email' => $sellerEmail
        ]);

        /** Serialização */
        $parsedSeller = $createdSeller->toArray();

        /** Gerar respostar http | Serialização */
        return response()->json($parsedSeller, 201);
    }
}
