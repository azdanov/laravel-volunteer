<?php

declare(strict_types=1);

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(User::class, 30)->create();
    }
}
