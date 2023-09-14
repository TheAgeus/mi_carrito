<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            [
                'name'=>'Laptop',
            ],
            [
                'name'=>'PC-Escritorio',
            ],
            [
                'name'=>'HDD',
            ],
            [
                'name'=>'SSD',
            ],
            [
                'name'=>'FUENTE',
            ],
        ];
        
        foreach ($categories as $category)
        {
            Categoria::create($category);
        } 
    }
}
