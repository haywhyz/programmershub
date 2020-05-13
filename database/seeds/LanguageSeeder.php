<?php
use App\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Language::create(['name'=>'C']);
        \App\Language::create(['name'=>'C#']);
        \App\Language::create(['name'=>'Java']);
        \App\Language::create(['name'=>'JavaScript']);
        \App\Language::create(['name'=>'Python']);
        \App\Language::create(['name'=>'PHP']);
        \App\Language::create(['name'=>'Ruby']);
        \App\Language::create(['name'=>'Golang']);
    }
}
