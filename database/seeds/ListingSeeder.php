<?php

declare(strict_types=1);

use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    public function run(): void
    {
        factory(Listing::class, 30)->create();
    }
}
