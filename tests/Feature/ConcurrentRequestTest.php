<?php
/**
 * Created by PhpStorm.
 * User: Arun
 * Date: 15.08.19
 * Time: 11:30
 */

namespace Tests\Feature;

use Tests\TestCase;

class ConcurrentRequestTest extends  TestCase
{
    /** @test */
    public function fail_incomplete_input()
    {
        $response = $this->json('POST', '/api/send-email');
        $response
            ->assertJsonValidationErrors('user_id');
    }

    /** @test */
    public function success_single_request()
    {
        sleep(5);
        $this->json('POST', '/api/send-email', [
            'user_id' => 1
        ])->assertStatus(200);
    }

}