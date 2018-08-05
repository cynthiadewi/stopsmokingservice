<?php

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
/*
        Seeder for Users, Thread, and Reply Table
        @author Cynthia Dewi 
        @version 02/08/2018
        @library https://medium.com/employbl/build-an-online-forum-with-laravel-initial-setup-and-seeding-part-1-a53138d1fffc
     */
$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'phone' => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Group::class, function(Faker $faker){
    return [
      'name' => $faker->company,
    ];
 });

 $factory->define(App\Member::class, function(Faker $faker){
    return [
      'group_id' => function(){
         return factory('App\Group')->create()->id;
      },
      'user_id' => function(){
        return factory('App\User')->create()->id;
     },
    ];
 });

$factory->define(App\Thread::class, function(Faker $faker){
   return [
     'user_id' => function(){
        return factory('App\User')->create()->id;
     },
     'group_id' => function(){
        return null;
     },
     'title' => $faker->sentence,
     'body' => $faker->paragraph
   ];
});

$factory->define(App\Reply::class, function(Faker $faker){
    return [
       'thread_id' => function(){
           return factory('App\Thread')->create()->id;
       },
       'user_id' => function(){
           return factory('App\User')->create()->id;
       },
       'body' => $faker->paragraph
    ];
});