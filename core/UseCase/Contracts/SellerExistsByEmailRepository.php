<?php

namespace Core\UseCase\Contracts;

interface SellerExistsByEmailRepository {

    public function existsByEmail(string $sellerEmail): bool;

}
