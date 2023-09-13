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
                'precio_mx'=>'500.69',
                'stock'=>'5',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod01',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '450.69'
            ],
            [
                'name'=>'ASROCK',
                'categoria_id'=>'1',
                'precio_mx'=>'554.69',
                'stock'=>'20',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod02',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '500.69'
            ],[
                'name'=>'ACOS Disc',
                'categoria_id'=>'4',
                'precio_mx'=>'300.69',
                'stock'=>'60',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod03',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '290.69'
            ],[
                'name'=>'Fuente xd',
                'categoria_id'=>'5',
                'precio_mx'=>'700.69',
                'stock'=>'3',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod03',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '690.69'
            ],[
                'name'=>'Fuente asdasd',
                'categoria_id'=>'5',
                'precio_mx'=>'700.69',
                'stock'=>'3',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod03',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '690.69'
            ],[
                'name'=>'Fuente qwasd',
                'categoria_id'=>'5',
                'precio_mx'=>'700.69',
                'stock'=>'3',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod03',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '690.69'
            ],[
                'name'=>'Fuente qwdasdqwd',
                'categoria_id'=>'5',
                'precio_mx'=>'700.69',
                'stock'=>'3',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod03',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '690.69'
            ],[
                'name'=>'Fuente qwdasd3qwd',
                'categoria_id'=>'5',
                'precio_mx'=>'700.69',
                'stock'=>'3',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod03',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '690.69'
            ],[
                'name'=>'Fuente qwdasdddqwd',
                'categoria_id'=>'5',
                'precio_mx'=>'700.69',
                'stock'=>'3',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod03',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '690.69'
            ],[
                'name'=>'Fuente qwdasdq12wd',
                'categoria_id'=>'5',
                'precio_mx'=>'700.69',
                'stock'=>'3',
                'usuario_id'=>'2',
                'codigo_proveedor' => 'testcod03',
                'proveedor' => 'testproveedor',
                'precio_proveedor' => '690.69'
            ],
        ];
        
        foreach ($items as $item)
        {
            Producto::create($item);
        } 
    }
}
