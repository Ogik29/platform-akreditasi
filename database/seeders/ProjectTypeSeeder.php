<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Web-Based'],
            ['name' => 'Mobile-Based'],
            ['name' => 'Hardware-Based'],
        ];

        foreach ($types as $t) {
            ProjectType::updateOrCreate(['name' => $t['name']], $t);
        }
    }
}
