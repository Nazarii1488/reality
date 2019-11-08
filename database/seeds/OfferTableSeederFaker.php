<?php

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferTableSeederFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Offer::class, 100)->create();
    }
}
