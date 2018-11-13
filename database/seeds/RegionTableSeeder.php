<?php

declare(strict_types=1);

use App\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            [
                'name' => 'Estonia',
                'children' => [
                    [
                        'name' => 'Harjumaa',
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
                        'children' => [
                            ['name' => 'Tartu'],
                            ['name' => 'Kallaste'],
                            ['name' => 'Elva'],
                        ],
                    ],
                    [
                        'name' => 'Ida-Virumaa',
                        'children' => [
                            ['name' => 'Kohtla-Järve'],
                            ['name' => 'Narva'],
                            ['name' => 'Narva-Jõesuu'],
                            ['name' => 'Sillamäe'],
                        ],
                    ],
                    [
                        'name' => 'Pärnumaa',
                        'children' => [
                            ['name' => 'Pärnu'],
                            ['name' => 'Sindi'],
                            ['name' => 'Lihula'],
                            ['name' => 'Kilingi-Nõmme'],
                        ],
                    ],
                    [
                        'name' => 'Lääne-Virumaa',
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
