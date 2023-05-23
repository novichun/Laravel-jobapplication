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

        $name = $faker->name;
        $email = $faker->unique()->safeEmail;
        $password = $faker->password(8);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('Generated User:');
        $this->info('Username: ' . $user->email);
        $this->info('Password: ' . $password);
    }
}
