<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use App\Models\Course;
use App\Models\Matter;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'company_id' => Auth::user()->company_id,
    ];
});

$factory->define(Course::class, function (Faker\Generator $faker) {
    return [
     'name' => $faker->name,
    ];
});

$factory->define(Serie::class, function (Faker\Generator $faker) {
    return [
     'name' => $faker->name
    ];
});


$factory->define(Matter::class, function (Faker\Generator $faker) {
    return [
     'name' => $faker->name,
     'category' => collect(['BN','PD'])->random(),
     'serie_id' => Serie::with(['course' => function($query){
     	$query->where('company_id', '=', Auth::user()->company_id);
     }])->first()->id,
    ];
});
