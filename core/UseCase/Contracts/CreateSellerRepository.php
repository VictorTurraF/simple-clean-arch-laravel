<?php

namespace Core\UseCase\Contracts;
use Core\Entity\Seller;

interface CreateSellerRepository {

    public function create(Seller $seller): Seller;

}
