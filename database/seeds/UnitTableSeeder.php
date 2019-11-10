<?php

use App\Model\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::truncate();

        $employee = new Unit();
        $employee->sektor_id = 1;
        $employee->nama = 'Unit 1';
        $employee->ketua_unit = 'Ketua Unit 1';
        $employee->save();

        $employee = new Unit();
        $employee->sektor_id = 1;
        $employee->nama = 'Unit 2';
        $employee->ketua_unit = 'Ketua Unit 2';
        $employee->save();

        $employee = new Unit();
        $employee->sektor_id = 2;
        $employee->nama = 'Unit 1';
        $employee->ketua_unit = 'Ketua Unit 1 Sektor 2';
        $employee->save();

        $employee = new Unit();
        $employee->sektor_id = 2;
        $employee->nama = 'Unit 2';
        $employee->ketua_unit = 'Ketua Unit 2 Sektor 2';
        $employee->save();
    }
}
