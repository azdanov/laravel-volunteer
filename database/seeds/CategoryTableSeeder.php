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
                    ['name' => 'Sales', 'usable' => true],
                    ['name' => 'Accounting', 'usable' => true],
                    ['name' => 'Advertisement', 'usable' => true],
                ],
            ],
            [
                'name' => 'Technology',
                'usable' => false,
                'children' => [
                    ['name' => 'Web Development', 'usable' => true],
                    ['name' => 'PC Setup', 'usable' => true],
                    ['name' => 'Networking', 'usable' => true],
                    ['name' => 'Teaching', 'usable' => true],
                ],
            ],
            [
                'name' => 'Assistance',
                'usable' => false,
                'children' => [
                    ['name' => 'Babysitting', 'usable' => true],
                    ['name' => 'Elderly Care', 'usable' => true],
                    ['name' => 'Substitute Teacher', 'usable' => true],
                    ['name' => 'Dog Walking', 'usable' => true],
                ],
            ],
            [
                'name' => 'Physical Work',
                'usable' => false,
                'children' => [
                    ['name' => 'Landscaping', 'usable' => true],
                    ['name' => 'Gardening', 'usable' => true],
                    ['name' => 'House Chores', 'usable' => true],
                    ['name' => 'Handyworker', 'usable' => true],
                ],
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
