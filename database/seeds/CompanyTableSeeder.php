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

        $company = new Company( [ 'cnpj' => '12828622000191', 
        	                      'name' => 'Instituto Educacional Santa Rosa', 
           	                      'address_name' => 'Rua Presidente Costa e Silva',
        	                      'address_number' => '487',
	        	                  'address_neighbor' => 'Santa Rosa',
	        	                  'address_postalcode' => '55540000',
	        	                  'address_city' => 'Palmares',
	        	                  'address_state' => 'PE',
	        	                  'phone_areacode' => '81',
	        	                  'phone_number' => '36622376',
	        	                  'email' => 'diretoria.iesr@gmail.com',
	        	                  'slogan' => 'Educando para o Futuro',
	        	                  'operation_act_number' => '3966',
	        	                  'ploy_date' => date_create('1994-07-30')
        	              ] );
        $company->save();

    }
}
