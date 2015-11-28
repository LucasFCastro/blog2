<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create(
            [
                'name' => 'Levi',
                'email' => 'levi@yahoo.com.br',
                'password' => bcrypt('bri1636'),
                'remember_token' => str_random(10),
            ]
        );
    }
}
