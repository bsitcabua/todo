<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payload = [
            [
                'name'          => 'Todo1',
                'completion'    => date('Y-m-d H:i:s'),
                'deadline'      => date('Y-m-d H:i:s'),
                'is_completed'  => 0,
            ],
            [
                'name'          => 'Todo2',
                'completion'    => date('Y-m-d H:i:s'),
                'deadline'      => date('Y-m-d H:i:s'),
                'is_completed'  => 1,
            ],

        ];

        DB::table('items')->insert($payload);
    }
}
