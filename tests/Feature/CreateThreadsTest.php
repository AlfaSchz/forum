<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function guests_can_not_create_new_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = make('App\Thread');

        $this->post('/threads', $thread->toArray());
    }

    /**
     * @test
     */
    public function guests_can_not_see_the_create_thread_page()
    {
        $this->withExceptionHandling();

        $this->get('/threads/create')
        ->assertRedirect('login');
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_create_new_threads()
    {
        $this->signIn();

        $thread = make('App\Thread');

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
            ->assertSee($thread->title);
    }
}
