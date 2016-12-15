<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();

        $user = new User( ['name' => 'Zilma Cristina', 
                           'email' => 'diretoria.iesr@gmail.com', 
                           'password' => bcrypt('1'),
                           'admin' => true
                          ] );
        $user->save();

    }
}
