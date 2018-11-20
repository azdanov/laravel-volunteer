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
                            ['name' => 'Tallinn'],
                            ['name' => 'Maardu'],
                            ['name' => 'Kehra'],
                            ['name' => 'Keila'],
                            ['name' => 'Saue'],
                            ['name' => 'Paldiski'],
                            ['name' => 'Loksa'],
                        ],
                    ],
                    [
                        'name' => 'Tartumaa',
                        'usable' => false,
                        'children' => [
                            ['name' => 'Tartu'],
                            ['name' => 'Kallaste'],
                            ['name' => 'Elva'],
                        ],
                    ],
                    [
                        'name' => 'Ida-Virumaa',
                        'usable' => false,
                        'children' => [
                            ['name' => 'Kohtla-Järve'],
                            ['name' => 'Narva'],
                            ['name' => 'Narva-Jõesuu'],
                            ['name' => 'Sillamäe'],
                        ],
                    ],
                    [
                        'name' => 'Pärnumaa',
                        'usable' => false,
                        'children' => [
                            ['name' => 'Pärnu'],
                            ['name' => 'Sindi'],
                            ['name' => 'Lihula'],
                            ['name' => 'Kilingi-Nõmme'],
                        ],
                    ],
                    [
                        'name' => 'Lääne-Virumaa',
                        'usable' => false,
                        'children' => [
                            ['name' => 'Rakvere'],
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
