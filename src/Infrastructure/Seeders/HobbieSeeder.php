<?php

namespace Src\Infrastructure\Seeders;

use Illuminate\Database\Seeder;
use Src\Domain\Hobbie;


class HobbieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teatro = Hobbie::factory()->create([
            'name' => 'teatro'
        ]);

        $cine = Hobbie::factory()->create([
            'name' => 'cine'
        ]);

        $deporte = Hobbie::factory()->create([
            'name' => 'deporte'
        ]);

        $yoga=  Hobbie::factory()->create([
            'name' => 'yoga'
        ]);
    }
}
