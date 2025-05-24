<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = ['E-commerce', 'Portfolio', 'Gestionale', 'Blog'];

        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();

            $newProject->name = $faker->word();
            $newProject->client = $faker->name();
            $newProject->period = $faker->dateTimeBetween('2024-01-01', 'now')->format('Y-m-d');
            $newProject->summary = $faker->paragraph(4);
            $newProject->type = $faker->randomElement($types);
            $newProject->status = $faker->randomElement(['in progress', 'completed']);
            $newProject->project_url = $faker->url;

            $newProject->save();
        }
    }
}
