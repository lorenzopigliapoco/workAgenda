<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('clientes')->insert([[
         
            
	        'ragSoc' 			=> 'Xiotra & Associati',
	        'nomeRef' 		    => 'Riccardo',
	        'cognomeRef' 		=> 'Magrini ',
	        'emailRef' 		    => 'riccardo@xiotra.it',
	        'ssid' 		        => '1',
	        'PEC' 	            => 'xiotra@pec.it',
			'PIVA' 	            => '01809243456'		        
		], [
	        'ragSoc' 			=> 'Dagomedia srl',
	        'nomeRef' 		    => 'Marco',
	        'cognomeRef' 		=> 'Pigliapoco ',
	        'emailRef' 		    => 'marco@dagomedia.it',
	        'ssid' 		        => '2',
	        'PEC' 	            => 'dagomedia@pec.it',
			'PIVA' 	            => '018092434789'		        
		], [
	        'ragSoc' 			=> 'Hapapas international',
	        'nomeRef' 		    => 'Giancarlo',
	        'cognomeRef' 		=> 'Bartolacci ',
	        'emailRef' 		    => 'giancarlo@hapapas.it',
	        'ssid' 		        => '3',
	        'PEC' 	            => 'hapaps@pec.it',
			'PIVA' 	            => '01809243121'		        
		], [
	        'ragSoc' 			=> 'Pierpaoli srl',
	        'nomeRef' 		    => 'Mauro',
	        'cognomeRef' 		=> 'Balducci ',
	        'emailRef' 		    => 'mauro@pierpaoli.it',
	        'ssid' 		        => '4',
	        'PEC' 	            => 'pierpaoli@pec.it',
			'PIVA' 	            => '01837143121'		        
		], [
	        'ragSoc' 			=> 'Izet Parquet',
	        'nomeRef' 		    => 'Izet',
	        'cognomeRef' 		=> 'Devolli ',
	        'emailRef' 		    => 'izet@parquet.it',
	        'ssid' 		        => '5',
	        'PEC' 	            => 'izetparquet@pec.it',
			'PIVA' 	            => '01809243199'		        
		], [
	        'ragSoc' 			=> 'Mengler srl',
	        'nomeRef' 		    => 'Giacomo',
	        'cognomeRef' 		=> 'Pastaresi ',
	        'emailRef' 		    => 'giacomo@megler.it',
	        'ssid' 		        => '6',
	        'PEC' 	            => 'mengler@pec.it',
			'PIVA' 	            => '01319542121'		        
		]]);
    }
}
