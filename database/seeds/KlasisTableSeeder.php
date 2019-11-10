<?php

use Illuminate\Database\Seeder;
use App\Model\Klasis;

class KlasisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Klasis::truncate();

        $employee = new Klasis();
        $employee->nama = 'Nama Klasis';
        $employee->sinode = 'Contoh Nama Sinode';
        $employee->save();
    }
}
