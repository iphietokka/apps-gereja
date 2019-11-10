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
        $this->call(UsersTableSeeder::class);
        $this->call(KlasisTableSeeder::class);
        $this->call(GerejaTableSeeder::class);
        $this->call(SektorTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(WadahTableSeeder::class);
        $this->call(KeluargaTableSeeder::class);
    }
}
