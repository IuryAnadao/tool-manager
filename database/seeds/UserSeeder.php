<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Usuario de teste',
            'email' => 'teste@teste.com.br',
            'password' => bcrypt('123456789')
        ]);

        User::create([
            'name' => 'Usuario de teste2',
            'email' => 'teste2@teste.com.br',
            'password' => bcrypt('123456789')
        ]);
    }
}
