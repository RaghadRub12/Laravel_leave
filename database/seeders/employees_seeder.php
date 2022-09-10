<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class employees_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name'=> 'raghad rub',
            'email'=>'rrub.cse@gmail.com',
            'address'=> 'Jenin',
            'gender'=>'female',
            'phone_no'=> '0597267398',
            'start_joining_date'=>'2022-09-06',
            'department_id'=> '1',
            'emp_type'=>'full_time',
            'is_admin'=>'y',
    
           ]);
           DB::table('employees')->insert([
            'name'=> 'nedal rub',
            'email'=>'nedal.cse@gmail.com',
            'address'=> 'Jenin',
            'gender'=>'male',
            'phone_no'=> '0597267398',
            'start_joining_date'=>'2022-09-06',
            'department_id'=> '1',
            'emp_type'=>'full_time',
            'is_admin'=>'y',
    
           ]);
    }
}
