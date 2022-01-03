<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Infrastructure\Seeders\HobbieSeeder;
use Src\Infrastructure\Seeders\UserAdminSeeder;
use Src\Infrastructure\Seeders\UsersCustomerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserAdminSeeder::class);
        $this->call(HobbieSeeder::class);
        $this->call(UsersCustomerSeeder::class);
    }
}
