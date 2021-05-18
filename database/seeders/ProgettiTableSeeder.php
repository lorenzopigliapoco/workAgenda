<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProgettiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('progettos')->insert([[
         
            'user_id'               => 1 ,
	        'nome_progetto' 		=> 'Corallo',
	        'descrizione' 		    => '- Gestione personale',
	        'note' 		            => '- finire da implementare',
	        'dataInizio' 		    => date('Y-m-d h:i:s'),
	        'dataFine' 		        => date('Y-m-d h:i:s'),
	        'costoOra' 	            => 5 ,
	        'ssid_cliente'		    => 1 ,

		], [

            'user_id' 				=> 2,
            'nome_progetto' 		=> 'Smeraldo',
	        'descrizione' 		    => '- Gestione clientela',
	        'note' 		            => '- Completato',
	        'dataInizio' 		    => date('Y-m-d h:i:s'),
	        'dataFine' 		        => date('Y-m-d h:i:s'),
	        'costoOra' 	            => 8 ,
			'ssid_cliente'		    => 2,

			
		], [

	        'user_id' 		        => 3,
	        'nome_progetto' 		=> 'Zaffiro',
	        'descrizione' 		    => '- Gestione commessa',
	        'note' 		            => '- migliorare',
	        'dataInizio' 		    => date('Y-m-d h:i:s'),
	        'dataFine' 		        => date('Y-m-d h:i:s'),
	        'costoOra' 	            => 9 ,
			'ssid_cliente'		    => 3 ,

		
		], [

	        'user_id' 		        => 4,
	        'nome_progetto' 		=> 'Fusion',
	        'descrizione' 		    => '- Gestione commessa',
	        'note' 		            => '- risolvere bug',
	        'dataInizio' 		    => date('Y-m-d h:i:s'),
	        'dataFine' 		        => date('Y-m-d h:i:s'),
	        'costoOra' 	            => 6 ,
			'ssid_cliente'		    => 6 ,

		
		], [

	        'user_id' 		        => 5,
	        'nome_progetto' 		=> 'Vision',
	        'descrizione' 		    => '- UI modificare',
	        'note' 		            => '- L utente richiede un miglioramento della UI',
	        'dataInizio' 		    => date('Y-m-d h:i:s'),
	        'dataFine' 		        => date('Y-m-d h:i:s'),
	        'costoOra' 	            => 11 ,
			'ssid_cliente'		    => 4 ,

		
		], [

	        'user_id' 		        => 6,
	        'nome_progetto' 		=> 'Diamante',
	        'descrizione' 		    => '- Logo',
	        'note' 		            => '- stile americano',
	        'dataInizio' 		    => date('Y-m-d h:i:s'),
	        'dataFine' 		        => date('Y-m-d h:i:s'),
	        'costoOra' 	            => 5 ,
			'ssid_cliente'		    => 2 ,

		
		]]);
    }
}
