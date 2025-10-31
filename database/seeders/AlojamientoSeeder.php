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
            'nombre' => 'Beverly Hills: Hotel & Business',
            'descripcion' => 'Hotel informal con habitaciones refinadas, piscina, gimnasio y desayuno tipo bufé y estacionamiento gratuitos. Ideal para viajeros de negocios y ocio en la capital.',
            'imagen_url' => 'https://images.squarespace-cdn.com/content/v1/57cde521e58c6267c228241e/1617724095744-4SXYV4E85QDV4XD80C6W/PHOTO-2021-01-11-11-42-27+%283%29.jpg',
            'precio_por_noche' => 94.00,
        ]);

        Alojamiento::create([
            'nombre' => 'Hotel Reef On The Water',
            'descripcion' => 'Alojamiento único que ofrece bungalows o habitaciones con vistas directas al mar. Es el lugar ideal para actividades acuáticas como surf o buceo, y cuenta con un restaurante de mariscos frescos.',
            'imagen_url' => 'https://a0.muscache.com/im/pictures/hosting/Hosting-47942995/original/f2b0dbec-a938-4dff-98e5-dd6edf0243bc.jpeg?im_w=720',
            'precio_por_noche' => 85.50
        ]);

        Alojamiento::create([
            'nombre' => 'Amaré Mar',
            'descripcion' => 'Un encantador hotel boutique frente al océano. Disfrute de la brisa marina, acceso directo a la playa y habitaciones con diseño costero moderno. Perfecto para una escapada romántica o de relax.',
            'imagen_url' => 'https://images.trvl-media.com/lodging/92000000/91630000/91620200/91620111/6698754d.jpg?impolicy=resizecrop&rw=575&rh=575&ra=fill',
            'precio_por_noche' => 72.00
        ]);

        Alojamiento::create([
            'nombre' => 'Hotel Sheraton Presidente El Salvador',
            'descripcion' => 'Lujoso hotel de 5 estrellas en San Salvador. Ofrece habitaciones elegantes con balcón, además de una gran piscina al aire libre, gimnasio, y un campo de golf. Ideal para una estancia de negocios o placer de alto nivel.',
            'imagen_url' => 'https://media.licdn.com/dms/image/v2/D561BAQFSIFcKqgJboQ/company-background_10000/company-background_10000/0/1657043838320/hotel_sheraton_presidente_cover?e=2147483647&v=beta&t=h5zdSeUJgQT75HSetYWPVtN5MbolD3_p6eHfsazZaW4',
            'precio_por_noche' => 179.00
        ]);

        Alojamiento::create([
            'nombre' => 'Boca Olas Resort Villas',
            'descripcion' => 'Un exclusivo resort de villas y cabañas ubicado en La Libertad, a pasos de las famosas playas de surf. Cuenta con varias piscinas, amplios jardines tropicales y un restaurante de cocina internacional con vistas al mar.',
            'imagen_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/46754970.jpg?k=049644659deca806dfc348a36b78802aacbbf2539a516b3099736dc119048b7e&o=&hp=1',
            'precio_por_noche' => 129.00
        ]);

        Alojamiento::create([
            'nombre' => 'Hotel Mirador Plaza',
            'descripcion' => 'Elegante hotel de 4 estrellas en el exclusivo barrio financiero de San Salvador. Ofrece habitaciones modernas, servicio de primera clase y una ubicación estratégica cerca de centros comerciales y restaurantes de alta cocina.',
            'imagen_url' => 'https://content.skyscnr.com/available/1912896670/1912896670_WxH.jpg',
            'precio_por_noche' => 96.00
        ]);

        Alojamiento::create([
            'nombre' => 'Hotel Michanti',
            'descripcion' => 'Un encantador hotel boutique con un aire tropical y rústico, situado estratégicamente cerca de la costa. Ofrece habitaciones frescas, terrazas privadas y un ambiente relajado, perfecto para entusiastas del surf y el descanso.',
            'imagen_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/577247907.jpg?k=9ef88792e9932f8fbd69aa840587c5db29279cb7bc0ed83ea78d98b5501b876d&o=&hp=1',
            'precio_por_noche' => 67.00
        ]);

        Alojamiento::create([
            'nombre' => 'Hotel Villa Florencia Centro Historico',
            'descripcion' => 'Un hotel agradable de 3 estrellas, con un diseño acogedor. Dispone de un hermoso patio cubierto con un área de descanso tranquila y habitaciones sencillas equipadas con Wi-Fi, ideal para explorar el centro histórico.',
            'imagen_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/02/65/20/5c/estrategicamente-bien.jpg?w=900&h=500&s=1',
            'precio_por_noche' => 25.00
        ]);
    }
}