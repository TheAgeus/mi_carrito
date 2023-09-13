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
            [
                'name'=>'Jejeje',
            ],
            [
                'name'=>'Some',
            ],
            [
                'name'=>'Google',
            ],
            [
                'name'=>'Mario',
            ],
            [
                'name'=>'BROS',
            ],
            [
                'name'=>'Kratos',
            ],
            [
                'name'=>'Hola',
            ],
            [
                'name'=>'df',
            ],
            [
                'name'=>'23dsd',
            ],
            [
                'name'=>'h76n',
            ],
            [
                'name'=>'sdc32',
            ],
            [
                'name'=>'76grfv',
            ],
            [
                'name'=>'cgbr67hrfg',
            ],
            [
                'name'=>'sdc54',
            ],
            [
                'name'=>'wd23sd',
            ],
        ];
        
        foreach ($categories as $category)
        {
            Categoria::create($category);
        } 
    }
}
