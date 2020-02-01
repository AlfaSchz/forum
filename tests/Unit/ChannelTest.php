<?php

namespace Tests\Unit;

use App\Channel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ChannelTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Channel
     */
    protected $channel;

    public function setUp(): void
    {
        parent::setUp();

        $this->channel = create('App\Channel');
    }

    /**
     * @test
     */
    public function a_channel_can_have_replies()
    {
        $thread = create('App\Thread', ['channel_id' => $this->channel->id]);

        $this->assertTrue($this->channel->threads->contains($thread));
    }
}
