<?php

namespace Core\UseCase;
use Core\Entity\Seller;
use Core\Exceptions\SellerEmailAlreadyInUseExeption;
use Core\UseCase\Contracts\CreateSellerRepository;
use Core\UseCase\Contracts\SellerExistsByEmailRepository;

class CreateSellerUseCase {

    public function __construct(
        private CreateSellerRepository $createSellerRepo,
        private SellerExistsByEmailRepository $existsSellerByEmailRepo
    ) {}

    public function execute($input): array
    {
        if ($this->existsSellerByEmailRepo->existsByEmail($input['sellerEmail']))
            throw new SellerEmailAlreadyInUseExeption();

        $seller = new Seller(
            name: $input['sellerName'],
            email: $input['sellerEmail']
        );

        $createdSeller = $this->createSellerRepo->create($seller);

        return $createdSeller->toArray();
    }
}
