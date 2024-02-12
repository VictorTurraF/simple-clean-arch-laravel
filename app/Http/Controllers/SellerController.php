<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSellerRequest;
use Core\UseCase\CreateSellerUseCase;

class SellerController extends Controller
{
    public function store(
        CreateSellerRequest $request,
        CreateSellerUseCase $useCase,
    ) {
        $input = $request->validated();

        $result = $useCase->execute([
            'sellerName' => $input['name'],
            'sellerEmail' => $input['email']
        ]);

        return response()->json($result, 201);
    }
}
