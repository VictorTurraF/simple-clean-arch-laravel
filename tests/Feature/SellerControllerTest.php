<?php

namespace Tests\Feature;

use App\Models\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellerControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $sellerData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
        ];

        $response = $this->postJson('/api/sellers', $sellerData);

        $response
            ->assertStatus(201)
            ->assertJson([
                'name' => $sellerData['name'],
                'email' => $sellerData['email']
            ]);


        $sellerId = $response->json('id');

        $this->assertNotNull($sellerId);

        $createdSeller = Seller::find($sellerId);
        $this->assertEquals($sellerData['name'], $createdSeller->name);
        $this->assertEquals($sellerData['email'], $createdSeller->email);
    }
}
