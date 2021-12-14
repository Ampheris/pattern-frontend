<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_history()
    {
        $response = $this->get('/history');

        $response->assertStatus(200);
    }
    public function test_orders()
    {
        $response = $this->get('/orders');

        $response->assertStatus(200);
    }
    public function test_profile()
    {
        $response = $this->get('/profile');

        $response->assertStatus(200);
    }
    public function test_profile_subscription()
    {
        $response = $this->get('/profile/subscription');

        $response->assertStatus(200);
    }
    public function test_admin()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }
    public function test_admin_bikes()
    {
        $response = $this->get('/admin/bikes');

        $response->assertStatus(200);
    }
    public function test_admin_cities()
    {
        $response = $this->get('/admin/cities');

        $response->assertStatus(200);
    }
    public function test_admin_parkingspace()
    {
        $response = $this->get('/admin/parkingspace');

        $response->assertStatus(200);
    }
    public function test_admin_chargingstation()
    {
        $response = $this->get('/admin/chargingstations');

        $response->assertStatus(200);
    }
}
