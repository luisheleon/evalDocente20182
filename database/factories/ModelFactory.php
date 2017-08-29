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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Sede::class, function (Faker\Generator $faker) {

    return [
        'sede' => $faker->name,
    ];
});

$factory->define(App\Perfil::class, function (Faker\Generator $faker) {

    return [
        'perfil' => $faker->name,
        'sede_id' => function()
        {
            return factory(App\Sede::class)->create()->id;
        }
    ];
});


$factory->define(App\Modulo::class, function (Faker\Generator $faker) {

    return [
        'modulo' => $faker->name,
        'image' => $faker->name,
        'orden' => $faker->unique()->randomDigit,
    ];
});

$factory->define(App\Pagina::class, function (Faker\Generator $faker) {

    return [
        'nombrepag' => $faker->name,
        'orden' => $faker->unique()->randomDigit,
        'modulo_id' => function()
        {
            return factory(App\Modulo::class)->create()->id;
        },
        'url' => $faker->url,
    ];
});


$factory->define(App\Funcionalidad::class, function (Faker\Generator $faker) {

    return [
        'pagina_id' => function()
        {
          return factory(App\Pagina::class)->create()->id;
        },
        'funcionalidad' =>  $faker->name,
        'nombreboton'   =>  $faker->name,
    ];
});

$factory->define(App\PerfilFuncionalidad::class, function (Faker\Generator $faker) {

    return [
        'perfil_id' => function()
        {
            return factory(App\Perfil::class)->create()->id;
        },
        'funcionalidad_id' => function()
        {
            return factory(App\Funcionalidad::class)->create()->id;
        },

    ];
});


$factory->define(App\Factor::class, function (Faker\Generator $faker) {

    return [
        'factor' => $faker->name,
        'estado' => $faker->numberBetween(1,2),
    ];
});
