<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         $this->call(UserTableSeeder::class);
         $this->call(RegionTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
    }
}
