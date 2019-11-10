<?php

use Illuminate\Database\Seeder;
use App\Model\Wadah;

class WadahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wadah::truncate();

        $employee = new Wadah();
        $employee->nama = 'Wadah 1';
        $employee->koordinator = ' Kordinator Wadah 1';
        $employee->save();

        $employee = new Wadah();
        $employee->nama = 'Wadah 2';
        $employee->koordinator = ' Kordinator Wadah 2';
        $employee->save();

        $employee = new Wadah();
        $employee->nama = 'Wadah 3';
        $employee->koordinator = ' Kordinator Wadah 3';
        $employee->save();

        $employee = new Wadah();
        $employee->nama = 'Wadah 4';
        $employee->koordinator = ' Kordinator Wadah 4';
        $employee->save();
    }
}
