<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Categorieseeder extends Seeder
{
    public function run(): void
    {
        // Fetch product data from the given URL
        $productDataResponse = Http::get('https://dummyjson.com/products');
        $productData = $productDataResponse->json();

        // Make sure $productData is an array and contains 'products' key
        if (is_array($productData) && isset($productData['products'])) {
            foreach ($productData['products'] as $product) {
                // Concatenate all image URLs into a single string
                $imageUrls = implode(',', $product['images']);

                // Insert the category record with title and all image URLs
                DB::table('categories')->insert([
                    'categoryName' => $product['title'],
                    'categoryImg' => $imageUrls,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } else {
            // Log or handle the case where the API response is not as expected
            // For now, let's just print a message
            echo "API response is not as expected.";
        }
    }
}
