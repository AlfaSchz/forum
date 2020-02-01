<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function unauthenticated_users_may_not_add_replies_to_a_thread()
    {
        $this->withExceptionHandling();
        $thread = create('App\Thread');
        $this->post($thread->path() . '/replies', [])
            ->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function an_authenticated_user_may_participate_in_a_thread()
    {
        $this->signIn();

        $thread = create('App\Thread');

        $reply = make('App\Reply');
        $this->post($thread->path() . '/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);
    }

    /**
     * @test
     */
    public function a_reply_requires_a_body()
    {
        $this->withExceptionHandling();
        $this->signIn();

        $thread = create('App\Thread');

        $reply = make('App\Reply', ['body' => null]);

        $this->post($thread->path() . '/replies', $reply->toArray())
            ->assertSessionHasErrors('body');
    }
}
