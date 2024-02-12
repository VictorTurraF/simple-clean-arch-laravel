<?php

namespace Tests\Unit\Core;

use Core\Entity\Seller;
use PHPUnit\Framework\TestCase;

class SellerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_seller_entity(): void
    {
        // Arrange
        $sellerName = "Victor";
        $sellerEmail = "victor@mail.com";

        // Act
        $seller = new Seller(
            name: $sellerName,
            email: $sellerEmail
        );

        // Assert
        $this->assertInstanceOf(Seller::class, $seller);
        $this->assertEquals($seller->toArray(), [
            'id' => "",
            'name' => "Victor",
            'email' => "victor@mail.com"
        ]);
    }

    public function test_update_id_of_seller(): void
    {
        // Arrange
        $sellerName = "Victor";
        $sellerEmail = "victor@mail.com";

        // Act
        $seller = new Seller(
            name: $sellerName,
            email: $sellerEmail
        );

        $seller->updateId("any-id");

        // Assert
        $this->assertInstanceOf(Seller::class, $seller);
        $this->assertEquals($seller->toArray(), [
            'id' => "any-id",
            'name' => "Victor",
            'email' => "victor@mail.com"
        ]);
    }
}
