<?php
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Faker\Factory as Faker;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Brand::create([
                'brandName' => $faker->word,
                'brandImg' => $faker->imageUrl(),
            ]);
        }
    }
}

?>