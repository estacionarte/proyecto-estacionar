<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creo users con el seeder
        $users = factory(App\User::class)->times(5)->create();
        foreach ($users as $user) {
          // Creo 2 espacios por cada user
          factory(App\Espacio::class)->times(2)->create([
            'idUser' => $user->id
          ]);
        }
    }
}
