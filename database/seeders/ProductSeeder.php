<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use function Laravel\Prompts\table;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responce = Http::get('https://dummyjson.com/products');
        $productData = $responce->json();

        if (is_array($productData) && isset($productData['products'])) {
            foreach ($productData['products'] as $product) {
                $newPrice = $product['price'] - ($product['price'] * ($product['discountPercentage'] / 100));

                // Store images in an array
                $imageUrls = $product['images'];
                //$imageUrls = implode(',', $product['images']);



                // Map the 'remark' value from JSON to possible enum values
                $remark = isset($product['remark']) ? $this->mapRemark($product['remark']) : 'regular';

                //$categoryId = $product['categoryName'] ?? null;
                //if ($categoryId) {
                //    $categoryId = $this->getCategoryId($categoryId);
                //}

                //// Check if the 'brandName' key exists before trying to access it
                //$brandId = $product['brandName'] ?? null;
                //if ($brandId) {
                //    $brandId = $this->getBrandId($brandId);
                //}

                // Set valid range for category_id (assuming valid range is 1 to 100)
                // Set random value for category_id (assuming valid range is 1 to 25)
                $categoryId = rand(1, 25);

                // Set random value for brand_id (assuming valid range is 1 to 30)
                $brandId = rand(1, 30);

                DB::table('products')->insert([
                    'title' => $product['title'],
                    'short_des' => $product['description'],
                    'price' => $product['price'],
                    'discount' => $product['discountPercentage'],
                    'discount_price' => $newPrice,
                    'image' =>   implode(',', $imageUrls),
                    'stock' => $product['stock'],
                    'star' => $product['rating'],
                    'remark' =>  $remark,
                    'category_id' => $categoryId,
                    'brand_id' => $brandId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }



    private function mapRemark($remark)
    {
        $possibleValues = ['popular', 'new', 'top', 'special', 'trending', 'regular'];

        // Use Laravel's Str::lower() to ensure consistency in case
        $lowercaseRemark = Str::lower($remark);

        // Check if the provided 'remark' value is in the possible values
        if (in_array($lowercaseRemark, $possibleValues)) {
            return $lowercaseRemark;
        }

        // Default to 'regular' if the value is not in the possible values
        return 'regular';
    }
    //public function getCategoryId($categoryName)
    //{
    //    return DB::table('categories')->where('categoryName', $categoryName)->value('id');
    //}
    //private function getBrandId($brandName)
    //{
    //    // Implement logic to fetch brand_id based on brand name
    //    // You may use a query or any other method depending on your data structure
    //    return DB::table('brands')->where('brandName', $brandName)->value('id');
    //}

    
}
