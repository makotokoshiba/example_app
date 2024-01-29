<?php

namespace Tests\Feature\Tweet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tweet;


class DeleteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_delete_successed(): void
    {
        $user = User::create([
            'name'=>'aaa',
            'email'=>'aaa@aa.co.jp',
            'password'=>Hash::make('test')
        ]);
        $this->actingAs($user);

        $tweet = Tweet::factory()->create(['user_id'=>$user->id]);

        $response = $this->delete('/tweets/destroy/' . $tweet->id);

        $response->assertRedirect('/tweets');
        
    }
}
