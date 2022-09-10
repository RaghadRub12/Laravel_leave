<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
        public function run()
        {
           DB::table('admins')->insert([
                'name' => 'Mohammed Safadi',
                'username' => 'ms1',
                'email' => 'ms1@safadi.ps',
                'password' => ('123'),
            ]);
        }
    
}
