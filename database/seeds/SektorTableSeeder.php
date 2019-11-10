<?php

use Illuminate\Database\Seeder;
use App\Model\Sektor;

class SektorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sektor::truncate();

        $employee = new Sektor();
        $employee->nama = 'Sektor 1';
        $employee->gereja_id = 1;
        $employee->save();

        $employee = new Sektor();
        $employee->nama = 'Sektor 2';
        $employee->gereja_id = 1;
        $employee->save();

        $employee = new Sektor();
        $employee->nama = 'Sektor 3';
        $employee->gereja_id = 1;
        $employee->save();

        $employee = new Sektor();
        $employee->nama = 'Sektor 4';
        $employee->gereja_id = 1;
        $employee->save();
    }
}
