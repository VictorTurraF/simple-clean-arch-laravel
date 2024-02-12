<?php

namespace App\Repositories;

use Core\UseCase\Contracts\CreateSellerRepository;
use Core\Entity\Seller;
use App\Models\Seller as SellerModel;

class EloquentCreateSellerRepository implements CreateSellerRepository {
    function create(Seller $seller): Seller {
        $createdSeller = SellerModel::create([
            'name' => $seller->getName(),
            'email' => $seller->getEmail()
        ]);

        $seller->updateId($createdSeller->id);

        return $seller;
    }
}
