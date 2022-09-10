<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class leaves_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leaves')->insert([
            'emp_name'=> 'raghad rub',
            'leave_type'=>'medical',
            'apply_reason'=>'medical reason',
            'applied_date'=>'2022-09-06',
            'status'=>'registered',

           ]);
           DB::table('leaves')->insert([
            'emp_name'=> 'nedal rub',
            'leave_type'=>'casual',
            'apply_reason'=>'casual reason',
            'applied_date'=>'2022-09-06',
            'status'=>'pinding',
            'created_at'=>'7-9-2020',
            'updated_at'=>'8-9-2020',

           ]);
    }
}
