<?php

use Illuminate\Database\Seeder;
use App\Model\Keluarga;

class KeluargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keluarga::truncate();

        $employee = new Keluarga();
        $employee->gereja_id = 1;
        $employee->sektor_id = 1;
        $employee->unit_id = 1;
        $employee->no_kk = '3140541';
        $employee->nama_ayah = 'Ismael';
        $employee->nama_ibu = 'Abaigail';
        $employee->tgl_nikah = '2019-11-07';
        $employee->save();

        $employee = new Keluarga();
        $employee->gereja_id = 1;
        $employee->sektor_id = 1;
        $employee->unit_id = 2;
        $employee->no_kk = '314054156';
        $employee->nama_ayah = 'Immanuel';
        $employee->nama_ibu = 'Achiera';
        $employee->tgl_nikah = '2019-11-07';
        $employee->save();

        $employee = new Keluarga();
        $employee->gereja_id = 1;
        $employee->sektor_id = 2;
        $employee->unit_id = 1;
        $employee->no_kk = '3140541562';
        $employee->nama_ayah = 'Jordan';
        $employee->nama_ibu = 'Adenia';
        $employee->tgl_nikah = '2019-11-07';
        $employee->save();

        $employee = new Keluarga();
        $employee->gereja_id = 1;
        $employee->sektor_id = 2;
        $employee->unit_id = 2;
        $employee->no_kk = '3140541569';
        $employee->nama_ayah = 'Lukas';
        $employee->nama_ibu = 'Ahsira';
        $employee->tgl_nikah = '2019-11-07';
        $employee->save();
    }
}
