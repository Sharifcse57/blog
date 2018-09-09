<?php

use Illuminate\Database\Seeder;

class userTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'role_id' =>1,
            'name' => 'Super Admin',
            'email' => 'sahadat@uysys.com',
            'password' => bcrypt('sahadat39'),
            'status'=>1,
        ]);
    }
}
