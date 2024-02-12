<?php

namespace App\Repositories;
use Core\UseCase\Contracts\SellerExistsByEmailRepository;
use App\Models\Seller as SellerModel;

class EloquentSellerExistsByEmailRepository implements SellerExistsByEmailRepository {

    public function existsByEmail(string $sellerEmail): bool
    {
        return SellerModel::where('email', $sellerEmail)->exists();
    }
}
