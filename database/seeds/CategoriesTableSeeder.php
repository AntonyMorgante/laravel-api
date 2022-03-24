<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<5; $i++){
            $cat = new Category();
            $cat->name = $faker->words(1, true);
            $cat->save();
        }
    }
}
