<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'ريادة الأعمال']);
        Category::create(['name' => 'العمل الحر']);
        Category::create(['name' => 'التسويق والمبيعات']);
        Category::create(['name' => 'التصميم']);
        Category::create(['name' => 'البرمجة']);
    }
}
