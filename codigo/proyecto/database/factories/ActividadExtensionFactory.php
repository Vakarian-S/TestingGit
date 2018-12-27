<?php

use Faker\Generator as Faker;

$factory->define(App\ActividadExtension::class, function (Faker $faker) {
    $convenioid = rand(0,App\Convenio::count());
    if($convenioid == 0){$convenioid = null;
    }
    return [
        'nombre' => $faker->sentence(3),
        'localizacion' => $faker->streetName,
        'organizador'=>$faker->name,
        'orador' => $faker->name,
        'fecha' => $faker ->dateTime,
        'cant_asistentes' => rand(1,50),
        'evidencia' => $faker->imageUrl(),
        'convenio_id' => $convenioid
        //
    ];
});
