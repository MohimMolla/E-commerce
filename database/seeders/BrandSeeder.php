<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {
        // Fetch product data from the given URL
        $productDataResponse = Http::get('https://dummyjson.com/products');
        $productData = $productDataResponse->json();

        // Make sure "products" key exists and it is an array
        if (isset($productData['products']) && is_array($productData['products'])) {
            foreach ($productData['products'] as $product) {
                // Access the "brand" and "thumbnail" values
                $brand = $product['brand'];
                $thumbnail = $product['thumbnail'];

                // Insert data into the brands table
                Brand::create([
                    'brandName' => $brand,
                    'brandImg' => $thumbnail,
                ]);
            }
        } else {
            
            echo "API response is not as expected.";
        }
    }
}
