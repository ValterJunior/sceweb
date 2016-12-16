<?php

use Illuminate\Database\Seeder;
use App\Models\{Settings,Company};

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('settings')->truncate();

        $settings = new Settings( [ 'company_id' => Company::first()->id,
        							'manager_cpf' => '64558261322',
  	        	               		'manager_name' => 'ZILMA CRISTINA ALMEIDA DE OLIVEIRA',
	        	               		'manager_occupation' => 'DIRETOR',
	        	               		'manager_email' => 'diretoria.iesr@gmail.com',
	        	               		'secretary_name' => 'CLAUDIA REGINA MOURA DE MELO',
	        	               		'bankslip_value' => 145.00,
	        	               		'bankslip_fine' => 2.00,
	        	               		'bankslip_interest' => 2.00,
	        	               		'bankslip_paymentplace' => 'CIDINHA CONFECÇÕES',
	        	               		'bankslip_observations' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut diam justo. Curabitur eros ante, laoreet ut libero eget, accumsan fringilla urna. Suspendisse quis ligula arcu. Vestibulum tincidunt dignissim nibh, eu blandit tortor porttitor ut. Proin posuere rutrum sodales. Donec semper eros rutrum sapien rhoncus semper. Donec id faucibus dui.'
            	                  ] );
        $settings->save();


    }
}
