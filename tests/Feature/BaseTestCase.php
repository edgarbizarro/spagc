<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class BaseTestCase extends TestCase
{
    use RefreshDatabase;

    protected function authenticate(): array
    {
        $user = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        return [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];
    }
}
