<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Given I have two records in the database that are posts.
        $first = factory(Post::class)->create();
        // and each one is posted a month apart.
        $second = factory(Post::class)->create([
            'created_at' => Carbon::now()->subMonth()
        ]);

        // When I fetch the archives.
        $posts = Post::archives();

        // Then the response should be in the proper format.
        $this->assertEquals([
            [
                'year' => (int) $second->created_at->format('Y'),
                'month' => $second->created_at->format('F'),
                'published' => 1,
            ],
            [
                'year' => (int) $first->created_at->format('Y'),
                'month' => $first->created_at->format('F'),
                'published' => 1,
            ]
            ], $posts->toArray());
    }
}
