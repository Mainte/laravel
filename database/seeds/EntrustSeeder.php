<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Permission;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/**
    		Rules
    	**/

		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'Amministratore'; // optional
		$admin->description  = 'Amministratore del sistema'; // optional
		$admin->save();

		$user = new Role();
		$user->name         = 'user';
		$user->display_name = 'Utente'; // optional
		$user->description  = 'Utente del sistema'; // optional
		$user->save();

		
		$usr=User::findOrFail(1);
		$usr->attachRole($admin);

		$usr=User::findOrFail(2);
		$usr->attachRole($user);

    }
}
