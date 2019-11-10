<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $employee = new User();
        $employee->name = 'Admin1';
        $employee->username = 'admin';
        $employee->active = 1;
        $employee->password = bcrypt('123456');
        $employee->save();

        $employee = new User();
        $employee->name = 'Admin2';
        $employee->username = 'admin2';
        $employee->active = 1;
        $employee->password = bcrypt('123456');
        $employee->save();
    }
}
