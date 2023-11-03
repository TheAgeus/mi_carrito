<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'comentario' => 'Este producto es muy bueno, super recomendado',
                'calificacion' => '5',
                'usuario_id' => '1',
                'producto_id' => '1'
            ],
            [
                'comentario' => 'Este producto es muy bueno, super recomendado bros',
                'calificacion' => '5',
                'usuario_id' => '2',
                'producto_id' => '1'
            ],
            [
                'comentario' => 'Este producto es muy bueno, super recomendado sisters',
                'calificacion' => '5',
                'usuario_id' => '3',
                'producto_id' => '1'
            ],
            [
                'comentario' => 'Este producto es bueno',
                'calificacion' => '3',
                'usuario_id' => '1',
                'producto_id' => '2'
            ],
            [
                'comentario' => 'Este producto es regular',
                'calificacion' => '3',
                'usuario_id' => '2',
                'producto_id' => '2'
            ],
            [
                'comentario' => 'Este producto regularrrrrr',
                'calificacion' => '5',
                'usuario_id' => '3',
                'producto_id' => '2'
            ],
        ];
        
        foreach ($items as $item)
        {
            Comentario::create($item);
        } 
    }
}
