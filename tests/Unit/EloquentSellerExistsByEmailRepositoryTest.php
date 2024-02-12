<?php

namespace Tests\Unit;

use App\Models\Seller;
use App\Repositories\EloquentSellerExistsByEmailRepository;
use Tests\TestCase;

class EloquentSellerExistsByEmailRepositoryTest extends TestCase
{

    public function test_repository_seller_exists_by_email(): void
    {
        // Arrange
        $createdSeller = Seller::factory()->create();
        $repo = new EloquentSellerExistsByEmailRepository();

        // Act
        $exists = $repo->existsByEmail($createdSeller->email);

        // Assert
        $this->assertTrue($exists);
    }

    public function test_repository_seller_not_exists_by_email(): void
    {
        // Arrange
        $repo = new EloquentSellerExistsByEmailRepository();

        // Act
        $exists = $repo->existsByEmail("any-email@ever.com");

        // Assert
        $this->assertFalse($exists);
    }
}
