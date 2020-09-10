<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $title = $faker->sentence;
    $status = $faker->randomElement([\App\Project::REVISION, \App\Project::PREAPPROVAL,\App\Project::APPROVAL,\App\Project::PUBLISHED,\App\Project::REJECTED]);
    return [
        'category_id' => \App\Category::all()->random()->id,
        'title' => $title,
        'slug' => str_slug($title,'-'),
        'price' => $faker->randomFloat($nbMaxDecimals = 0, $min = 1000, $max = 10000),
        'description' => $faker->text(1500),
        'short_description' => $faker->sentence,
        'iframe_video' => 'vXHOorXZ8qY',
        'project_picture' => \Faker\Provider\Image::image(storage_path() . '/app/public/projects', 370,240,'fashion', false),
        'status' => $status,
        'previous_approved' => $status !== \App\Project::PUBLISHED ? false : true,
        'previous_rejected' => $status !== \App\Project::REJECTED ? true :false
    ];
});
