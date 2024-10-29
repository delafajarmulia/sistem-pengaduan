<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    // public function test_the_application_returns_a_successful_response(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/'); // Mengakses route '/'
        $response->assertStatus(200); // Memastikan status 200
        $response->assertSee('spots'); // Memastikan halaman mengandung kata "spots"
    }

}
