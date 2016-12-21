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
	        	                  'operation_act_number' => '3966'
        	              ] );
        $company->save();

    }
}
