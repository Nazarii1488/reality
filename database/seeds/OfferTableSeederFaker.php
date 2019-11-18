<?php

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferTableSeederFaker extends Seeder
{
    public function run()
    {
        factory(Offer::class, 100)->create();
    }
}
