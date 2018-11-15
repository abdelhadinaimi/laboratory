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
        
	    $user = new User();

	    $user->name = 'Admin';
	    $user->email = 'admin@admin.com';
	    $user->password = Hash::make('password');
        $user->prenom = 'Admin';
        $user->date_naissance = date('Y-m-d', strtotime('1996-01-25'));
        $user->num_tel = '0541526396';
        $user->grade = 'MAA';
        $user->role_id = '1';
        $user->photo = 'uploads/photo/userDefault.png';

        // $user->equipe_id ='1';

        
	    $user->save();

    }
}
