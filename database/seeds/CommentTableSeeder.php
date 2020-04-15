<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 20)->create()->each(function ($post) {
            factory(App\Comment::class)->create([
                'commentable_id' => $post->id,
                'commenter_id' => App\User::all()->random()->id
            ]);
        });
    }
}
