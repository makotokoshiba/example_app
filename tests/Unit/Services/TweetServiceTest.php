<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use App\Services\TweetService;
use Mockery;


class TweetServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     * @runInSeparateProcess
     */
    public function test_own_tweet()
    {
        $tweetService = new TweetService();

        $mock = Mockery::mock('alias:App\Models\Tweet');
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id'=>1,
            'user_id'=>1
        ]);

        $result = $tweetService->ownTweet(1,1);
        $this->assertTrue($result);

        $result = $tweetService->ownTweet(2,1);
        $this->assertFalse($result);
    }
}
