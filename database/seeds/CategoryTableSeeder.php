<?php

declare(strict_types=1);

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Business',
                'usable' => false,
                'children' => [
                    ['name' => 'Sales'],
                    ['name' => 'Accounting'],
                    ['name' => 'Advertisement'],
                ],
            ],
            [
                'name' => 'Technology',
                'usable' => false,
                'children' => [
                    ['name' => 'Web Development'],
                    ['name' => 'PC Setup'],
                    ['name' => 'Networking'],
                    ['name' => 'Teaching'],
                ],
            ],
            [
                'name' => 'Assistance',
                'usable' => false,
                'children' => [
                    ['name' => 'Babysitting'],
                    ['name' => 'Elderly Care'],
                    ['name' => 'Substitute Teacher'],
                    ['name' => 'Dog Walking'],
                ],
            ],
            [
                'name' => 'Physical Work',
                'usable' => false,
                'children' => [
                    ['name' => 'Landscaping'],
                    ['name' => 'Gardening'],
                    ['name' => 'House Chores'],
                    ['name' => 'Handyworker'],
                ],
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
