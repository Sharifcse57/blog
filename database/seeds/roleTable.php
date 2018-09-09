<?php

use Illuminate\Database\Seeder;

class roleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'description' => 'Super Admin role panel',
            'status' => 1,
            'is_deletable' => 0,
        ]);

    }
}
