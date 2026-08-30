<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use Illuminate\Database\Seeder;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supervisors = [
            ['code' => 'MDB', 'name' => 'Muhammad Adib Kamali, S.T., M.Eng'],
            ['code' => 'FZK', 'name' => 'Dr. Farah Zakiyah Rahmanti, S.ST., M.T'],
            ['code' => 'MUN', 'name' => 'Mastuty Ayu Ningtyas, S.Kom., M.MT.'],
            ['code' => 'YOH', 'name' => 'Yohanes Setiawan, S.Si., M.Kom.'],
            ['code' => 'CAP', 'name' => 'Dr. Helmy Widyantara, S.Kom., M.Eng.'],
        ];

        foreach ($supervisors as $sup) {
            Supervisor::updateOrCreate(['code' => $sup['code']], $sup);
        }
    }
}
