<?php

namespace Tests\Unit;

use App\Repositories\EloquentCreateSellerRepository;
use Core\Entity\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EloquentCreateSellerRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_repository_create_seller(): void
    {
        // Arrange
        $repo = new EloquentCreateSellerRepository();
        $seller = new Seller(
            name: "Victor",
            email: "turra@mail.com",
        );

        // Act
        $createdSeller = $repo->create($seller);
        $createdSellerArray = $createdSeller->toArray();

        // Assert
        $this->assertEquals($createdSellerArray, [
            'id' => $createdSeller->getId(),
            'name' => "Victor",
            'email' => "turra@mail.com"
        ]);

        $this->assertArrayHasKey('id', $createdSellerArray);

        // Assert db created
        $this->assertDatabaseHas('sellers', [
            'id' => $createdSeller->getId(),
            'name' => "Victor",
            'email' => "turra@mail.com"
        ]);
    }
}
