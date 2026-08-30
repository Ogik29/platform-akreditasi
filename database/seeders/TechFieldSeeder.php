<?php

namespace Database\Seeders;

use App\Models\TechField;
use Illuminate\Database\Seeder;

class TechFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            ['name' => 'Artificial Intelligence', 'color_code' => '#38bdf8'],
            ['name' => 'Internet of Things', 'color_code' => '#34d399'],
            ['name' => 'Networking & Cyber Security', 'color_code' => '#fbbf24'],
            ['name' => 'Virtual & Augmented Reality', 'color_code' => '#c084fc'],
            ['name' => 'Others / Lainnya', 'color_code' => '#cbd5e1'],
        ];

        foreach ($fields as $tf) {
            TechField::updateOrCreate(['name' => $tf['name']], $tf);
        }
    }
}
