<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $title = Str::random(20);
        // $title = str()->random(20);

        for ($i=0; $i < 20; $i++) {
            # code...

            $c = Category::inRandomOrder()->first();

            Post::create(
                [
                    'title' => $title,
                    'slug' => Str::slug($title),
                    // 'slug' => str($title)->slug(),
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem enim consequuntur dolorem velit unde. Nulla voluptates quaerat tempora autem fuga?</p>',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                    'posted' => 'yes',
                    'category_id' => $c->id
                ]
            );
        }

    }
}
