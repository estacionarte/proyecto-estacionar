<?php

use Illuminate\Database\Seeder;

class EspaciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Espacio::class)->times(2)->create();
    }
}
