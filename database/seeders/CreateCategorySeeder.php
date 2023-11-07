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
            ['name'=>'LAPTOP',],
            ['name'=>'COMPUTADORA DE ESCRITORIO',],
            ['name'=>'HDD',],
            ['name'=>'SSD',],
            ['name'=>'FUENTE DE PODER',],
            ['name'=>'CABLES SATA',],
            ['name'=>'RATONES',],
            ['name'=>'TECLADOS',],
            ['name'=>'MONITORIES',],
            ['name'=>'RAM',],
            ['name'=>'EQUIPO PARA SERVIDOR',],
            ['name'=>'EQUIPO PARA OFICINA',],
        ];
        
        foreach ($categories as $category)
        {
            Categoria::create($category);
        } 
    }
}
