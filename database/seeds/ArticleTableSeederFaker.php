<?php

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleTableSeederFaker extends Seeder
{
    public function run()
    {
        factory(Article::class, 10)->create();
    }
}
