<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $items = [
            [
                'name'=>'Asus LGTB',
                'categoria_id'=>'1',
                'precio_mx'=>'500',
                'codigo'=>'ae-fe-drs-c-2',
                'stock'=>'5',
                'usuario_id'=>'2'
            ],
            [
                'name'=>'ASROCK',
                'categoria_id'=>'1',
                'precio_mx'=>'554',
                'codigo'=>'ASEDA-ASDE-ASD',
                'stock'=>'20',
                'usuario_id'=>'2'
            ],[
                'name'=>'ACOS Disc',
                'categoria_id'=>'4',
                'precio_mx'=>'300',
                'codigo'=>'1233-342-34-',
                'stock'=>'60',
                'usuario_id'=>'2'
            ],[
                'name'=>'Fuente xd',
                'categoria_id'=>'5',
                'precio_mx'=>'700',
                'codigo'=>'23sf-21d3c-c23',
                'stock'=>'3',
                'usuario_id'=>'2'
            ],
        ];
        
        foreach ($items as $item)
        {
            Producto::create($item);
        } 
    }
}
