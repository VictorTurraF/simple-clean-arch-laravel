<?php

namespace Tests\Unit\Core;

use Core\Entity\Seller;
use Core\UseCase\Contracts\CreateSellerRepository;
use Core\UseCase\Contracts\SellerExistsByEmailRepository;
use Core\UseCase\CreateSellerUseCase;
use PHPUnit\Framework\TestCase;

class CreateSellerUseCaseTest extends TestCase
{
    public function test_create_seller_use_case(): void
    {
        // Arrange
        $createSellerRepoMock = $this->createMock(CreateSellerRepository::class);
        $existsByEmailSellerRepoMock = $this->createMock(SellerExistsByEmailRepository::class);

        $useCase = new CreateSellerUseCase(
            $createSellerRepoMock,
            $existsByEmailSellerRepoMock,
        );

        // Mocks
        $existsByEmailSellerRepoMock
            ->expects($this->once())
            ->method('existsByEmail')
            ->with('turra@mail.com')
            ->willReturn(false);

        $createSellerRepoMock
            ->expects($this->once())
            ->method('create')
            ->with(new Seller(name: 'Victor', email: 'turra@mail.com'))
            ->willReturn(new Seller(name: 'Victor', email: 'turra@mail.com', id: 'any-id'));

        // Act
        $result = $useCase->execute([
            'sellerName' => "Victor",
            'sellerEmail' => "turra@mail.com"
        ]);

        // Assert
        $this->assertEquals($result, [
            'id' => 'any-id',
            'name' => 'Victor',
            'email' => 'turra@mail.com'
        ]);
    }
}
