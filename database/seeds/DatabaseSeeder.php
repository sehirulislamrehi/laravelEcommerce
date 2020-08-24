<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        //category seeding
        $this->call(CategorySeeder::class);

        //brand seeding
        $this->call(BrandSeeder::class);

        //product seeding
        $this->call(ProductSeeder::class);

        //Division seeding
        $this->call(DivisionSeeder::class);

        //District seeding
        $this->call(DistrictSeeder::class);
    }
}
