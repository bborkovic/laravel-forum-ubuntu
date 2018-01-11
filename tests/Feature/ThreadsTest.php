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
   public function a_user_can_browse_threads() {
        $response = $this->get('/categories')->assertSee('No Threads');
   }

}
