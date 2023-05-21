<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

use Illuminate\Console\Command;

class GenerateRandomUser extends Command
{
    protected $signature = 'generate:random-user';
    protected $description = 'Generates a random user with random data';

    public function handle()
    {
        $faker = Faker::create();

        $user = new User();
        $user->name = $faker->name;
        $user->email = $faker->unique()->safeEmail;
        $user->password = Hash::make($faker->password);
        $user->save();

        $this->info('Generated User:');
        $this->info('Username: ' . $user->email);
        $this->info('Password: ' . $faker->password);
    }
}
