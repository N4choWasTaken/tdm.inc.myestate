<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Estate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = User::factory()->create([
            'name' => 'Micha',
            'email' => 'micha.baumann@gmx.ch'
        ]);

        //\App\Models\User::factory(1)->create();
        Estate::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
