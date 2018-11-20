<?php

declare(strict_types=1);

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            [
                'name' => 'Estonia',
                'usable' => false,
                'children' => [
                    [
                        'name' => 'Harjumaa',
                        'usable' => false,
                        'children' => [
                            ['name' => 'Tallinn', 'usable' => true],
                            ['name' => 'Maardu', 'usable' => true],
                            ['name' => 'Kehra', 'usable' => true],
                            ['name' => 'Keila', 'usable' => true],
                            ['name' => 'Saue', 'usable' => true],
                            ['name' => 'Paldiski', 'usable' => true],
                            ['name' => 'Loksa', 'usable' => true],
                        ],
                    ],
                    [
                        'name' => 'Tartumaa',
                        'usable' => false,
                        'children' => [
                            ['name' => 'Tartu', 'usable' => true],
                            ['name' => 'Kallaste', 'usable' => true],
                            ['name' => 'Elva', 'usable' => true],
                        ],
                    ],
                    [
                        'name' => 'Ida-Virumaa',
                        'usable' => false,
                        'children' => [
                            ['name' => 'Kohtla-Järve', 'usable' => true],
                            ['name' => 'Narva', 'usable' => true],
                            ['name' => 'Narva-Jõesuu', 'usable' => true],
                            ['name' => 'Sillamäe', 'usable' => true],
                        ],
                    ],
                    [
                        'name' => 'Pärnumaa',
                        'usable' => false,
                        'children' => [
                            ['name' => 'Pärnu', 'usable' => true],
                            ['name' => 'Sindi', 'usable' => true],
                            ['name' => 'Lihula', 'usable' => true],
                            ['name' => 'Kilingi-Nõmme', 'usable' => true],
                        ],
                    ],
                    [
                        'name' => 'Lääne-Virumaa',
                        'usable' => false,
                        'children' => [
                            ['name' => 'Rakvere', 'usable' => true],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
