<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(\App\Post::class);
         $this->call(\App\Comment::class);
         $this->call(\App\Tag::class);

        Model::reguard();
    }
}
