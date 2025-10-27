<?php

namespace Database\Seeders;

use App\Models\Alojamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlojamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alojamiento::create([
            'nombre' => 'Cabaña en el Bosque',
            'descripcion' => 'Una hermosa cabaña alejada de la ciudad, perfecta para relajarse.',
            'imagen_url' => 'https://picsum.photos/seed/cabaña/400/300',
            'precio_por_noche' => 150.00,
        ]);

        Alojamiento::create([
            'nombre' => 'Apartamento Moderno en la Ciudad',
            'descripcion' => 'Disfruta de la vida urbana con todas las comodidades modernas.',
            'imagen_url' => 'https://picsum.photos/seed/apartamento/400/300',
            'precio_por_noche' => 95.50
        ]);

        Alojamiento::create([
            'nombre' => 'Villa frente al Mar',
            'descripcion' => 'Despierta con el sonido de las olas en esta lujosa villa.',
            'imagen_url' => 'https://picsum.photos/seed/playa/400/300',
            'precio_por_noche' => 275.00
        ]);
    }
}
