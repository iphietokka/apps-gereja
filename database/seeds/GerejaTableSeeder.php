<?php

use App\Model\Gereja;
use Illuminate\Database\Seeder;

class GerejaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gereja::truncate();

        $employee = new Gereja();
        $employee->klasis_id = 1;
        $employee->nama = 'Gereja Kristen Indonesia';
        $employee->alamat = 'Jalan Salemba Raya No. 10, Jakarta Pusat 10430';
        $employee->no_telp = '(021)3140541';
        $employee->ketua = 'Pdt. Dr. Henriette T';
        $employee->sekretaris = 'Hutabarat-Lebang';
        $employee->penghantar_jemaat = 'Pdt. Dr. Henriette T';
        $employee->save();
    }
}
