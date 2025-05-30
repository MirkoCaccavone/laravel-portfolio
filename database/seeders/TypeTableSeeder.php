<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['E-commerce', 'Portfolio', 'Gestionale', 'Blog'];

        foreach ($types as $type) {
            $newType = new Type();

            $newType->name = $type;
            $newType->save();
        }
    }
}
