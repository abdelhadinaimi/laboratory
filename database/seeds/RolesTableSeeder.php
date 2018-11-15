<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
		    ['nom' => 'admin'],
		    ['nom' => 'membre' ],
		  
	    ];

	    DB::table('roles')->insert($roles);
    }
}
