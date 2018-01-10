<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use App\Category;

class BasicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   public function testHomePage() {
        $response = $this->get('/categories')->assertSee('No Threads');
   }

}
