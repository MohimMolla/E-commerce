<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            Profile::factory()->count(50)->create();

            DB::table('profiles')->insert([
                'firstName' => 'John',
                'lastName' => 'Doe',
                'mobile' => '1234567890',
                'city' => 'Sample City',
                'shippingAddress' => '123 Sample Street, Sample City',
                'email' => 'john.doe@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
    }
}
