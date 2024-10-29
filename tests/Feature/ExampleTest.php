<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\Log;
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
        if ($response->status() !== 200) {
            Log::info('Response content:', [$response->getContent()]);
        }    
        $response->dump();
        dd($response);
        $response->assertStatus(200); // Memastikan status 200
        $response->assertSee('spots'); // Memastikan halaman mengandung kata "spots"
    }

}
