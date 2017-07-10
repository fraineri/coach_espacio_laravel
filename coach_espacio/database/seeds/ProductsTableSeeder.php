<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    	$factory->define(App\Product::class, function (Faker\Generator $faker) {
		    return [
		        'name' => $faker->word() + " " + $faker->word(),
		        'description' => $faker->text(),
		        'price' => $faker->randomFloat($nbMaxDecimals=2),
		        'category_id' => $faker->numberBetween(1,9),
		        'stock' => numberBetween(1,250),
		        'picture' => $faker->text()
		    ];
		});
    }
}
