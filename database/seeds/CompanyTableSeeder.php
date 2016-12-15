<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();

        $user = new Company( [ 'cnpj' => '12828622000191', 
        	                   'name' => 'INSTITUTO EDUCACIONAL SANTA ROSA', 
        	                   'address_name' => 'RUA PRESIDENTE COSTA E SILVA',
        	                   'address_number' => '487',
	        	               'address_neighbor' => 'SANTA ROSA',
	        	               'address_postalcode' => '55540000',
	        	               'address_city' => 'PALMARES',
	        	               'address_state' => 'PE',
	        	               'phone_areacode' => '81',
	        	               'phone_number' => '36622376',
	        	               'email' => 'diretoria.iesr@gmail.com',
	        	               'slogan' => 'Educando para o Futuro',
	        	               'operation_act_number' => '3966',
	        	               'ploy_date' => date_create('1994-07-30'),
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
        $user->save();

    }
}
