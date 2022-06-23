<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\users;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table("users")->insert([
            'full_nam'=>'Nam',
            'email'=>'nguyenngocnam2700@gmail.com',
            'password'=>bcrypt('123456'),
            'phone'=>'0123456789',
            'address'=>'Hưng Yên',
        ]);
    }
}
