<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone' => $faker->phoneNumber,
        'usertype' => $faker->randomElement($array=array('landlord','renter')),
        'account_type' => 'none',
        'valid_id' => 'none',
        'valid_id2' => 'none', 
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// $factory->define(Post::class, function (Faker $faker) {
//     return [
//         'title' => $faker->text(5),
//         'location' => $faker->address,
//         'bed_no' => rand(1, 10),
//         'bathroom_no' => rand(1, 10),
//         'price' => rand(10000, 20000),
//         'unit_type' => $faker->randomElement($array=array('apartment','condo','house','bedspace')),
//         'body' => $faker->sentence,
//         'user_id' => rand(1, 10),
//         'images' => 'none',
        
//     ];
// });

$factory->define(App\Message::class, function (Faker $faker) {
    do{
        $from = rand(1, 15);
        $to = rand(1, 15);
    }
    while ($from === $to);
    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence,
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
     return [
         'title' => $faker->sentence,
         'location' => $faker->address,
         'bed_no' => rand(1, 15),
         'bathroom_no' => rand(1, 15),
         'price' => rand(2000, 12000),
         'unit_type' => $faker->randomElement($array=array('bed-spacer','appartment','condo','hotel')),
         'body' => $faker->sentence,
         'images' => 'none', 
         'user_id'=> rand(1, 15),

     ];
 });
