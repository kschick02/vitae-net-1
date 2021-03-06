<?php
use App\Order;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Order::class, function (Faker $faker) {
    $name = $faker->words(2, true);
    return [
        'name' => $name,
        'description' => $faker->sentence(6, true),
        'file_path' => 'orders/' . $name . rand(1111, 9999) . '.pdf',
        'patient_id' => function() {
            return factory(App\Patient::class)->create()->medical_record_number;
        },
        'completed' => $faker->boolean,
    ];
});

$factory->state(App\Order::class, 'incomplete', function (Faker $faker) {
    return [
        'completed' => false,
    ];
});

$factory->state(App\Order::class, 'complete', function (Faker $faker) {
    return [
        'completed' => true,
    ];
});

$factory->state(App\Order::class, 'unassigned', [
    'patient_id' => null,
]);
