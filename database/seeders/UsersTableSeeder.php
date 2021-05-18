<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([[
	        'nome' 			=> 'Lorenzo',
	        'cognome' 		=> 'Pigliapoco',
	        'email' 		=> 'lorenzo@workagenda.com',
	        'password' 		=> bcrypt('password'),
	        'ruolo' 		=> 'Admin',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')		        
		], [
	        'nome' 			=> 'Francesco',
	        'cognome' 		=> 'Assanti',
	        'email' 		=> 'francesco@workagenda.com',
	        'password' 		=> bcrypt('password'),
	        'ruolo' 		=> 'Admin',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')		    	        
		], [
	        'nome' 			=> 'Edoardo',
	        'cognome' 		=> 'Pierpaoli',
	        'email' 		=> 'edoardo@workagenda.com',
	        'password' 		=> bcrypt('password'),
	        'ruolo' 		=> 'Admin',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')		    	        
		], [
	        'nome' 			=> 'Nicholas',
	        'cognome' 		=> 'Piangerelli',
	        'email' 		=> 'nicholas@workagenda.com',
	        'password' 		=> bcrypt('password'),
	        'ruolo' 		=> 'Semplice',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')		    	        
		], [
	        'nome' 			=> 'Giacomo',
	        'cognome' 		=> 'Pesaresi',
	        'email' 		=> 'giacomo@workagenda.com',
	        'password' 		=> bcrypt('password'),
	        'ruolo' 		=> 'Semplice',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')		    	        
		], [
	        'nome' 			=> 'Lucien',
	        'cognome' 		=> 'Bikai',
	        'email' 		=> 'lucien@workagenda.com',
	        'password' 		=> bcrypt('password'),
	        'ruolo' 		=> 'Semplice',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')		    	        
		]]);
    }
}
