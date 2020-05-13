<?php

use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Specialization::create(['name'=>'Digital Marketting']);
        \App\Specialization::create(['name'=>'Web Development']);
        \App\Specialization::create(['name'=>'Mobile App Development']);
        \App\Specialization::create(['name'=>'Artificial Intelligence']);
        \App\Specialization::create(['name'=>'Bioinformatics']);

    }
}
