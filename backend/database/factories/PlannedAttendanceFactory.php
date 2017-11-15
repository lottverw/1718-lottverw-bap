<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\PlannedAttendance::class, function (Faker $faker) {
    $children = App\Models\Child::pluck('id');
    $organizations = App\Models\Organization::pluck('id');
    $guardian = App\Models\Guardian::pluck('id');
    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'type' => generateDay(),
        'registered_on' => $faker->dateTime($max = 'now'),
        'pickup_time' => $faker->time($format = 'H:i', $max = 'now'),
        'other_details' => $faker->date(),
        'go_home_alone' => $faker->boolean($chanceOfGettingTrue = 5),
        'no_show' => $faker->boolean($chanceOfGettingTrue = 0),
        'organization_id' => rand(1, (count($organizations) - 1)),
        'child_id' => rand(1, (count($children) - 1)),
        'has_been_pickup_by' =>rand(1, (count($guardian) - 1)),
    ];
});

function generateDay() {
    $m = 'moring'; $f = 'afternoon'; $d = 'full day';
    $x = rand(1, 3);
    switch($x){
        case $x == 1:
            return $m;
            break;
        case $x == 2:
            return $f;
            break;
        case $x == 3:
            return $d;
            break;
    }
} 

