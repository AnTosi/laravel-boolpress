<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i = 0; $i <15; $i++){
            $post = new Post();
            $post->title = $faker->sentence(3);
            $post->slug = Str::slug($post->title);
            $post->image = $faker->imageUrl(1200, 480, 'Posts', true, $post->title);

            // This is to seed placeholders fakers image and save them in the storage, but i don't feel like fresh migrating everything and risk blowing up the database
            // $post->image = 'placeholders/' . $faker->image('public/storage/placeholders', 1200, 480, 'Posts', false, true, $post->title);
            $post->sub_title = $faker->sentence(4);
            $post->body = $faker->paragraphs(10, true);
            $post->save();
        }
    }
}
