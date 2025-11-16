<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $marcas = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan', 'Volkswagen', 'BMW', 'Mercedes-Benz', 'Audi', 'Hyundai'];
        
        $modelos = [
            'Toyota' => ['Corolla', 'Camry', 'RAV4', 'Hilux'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Fit'],
            'Ford' => ['Fiesta', 'Focus', 'Mustang', 'Explorer'],
            'Chevrolet' => ['Spark', 'Cruze', 'Malibu', 'Silverado'],
            'Nissan' => ['Versa', 'Sentra', 'Altima', 'X-Trail'],
            'Volkswagen' => ['Polo', 'Golf', 'Jetta', 'Tiguan'],
            'BMW' => ['Serie 1', 'Serie 3', 'Serie 5', 'X5'],
            'Mercedes-Benz' => ['Clase A', 'Clase C', 'Clase E', 'GLC'],
            'Audi' => ['A3', 'A4', 'A6', 'Q5'],
            'Hyundai' => ['i20', 'Elantra', 'Sonata', 'Tucson']
        ];
        
        $colores = ['Blanco', 'Negro', 'Gris', 'Plata', 'Rojo', 'Azul', 'Verde', 'Amarillo'];
        
        for ($i = 0; $i < 20; $i++) {
            $marca = $marcas[array_rand($marcas)];
            $modelo = $modelos[$marca][array_rand($modelos[$marca])];
            $year = rand(2015, 2024);
            $color = $colores[array_rand($colores)];
            $precio = rand(10000, 50000) + (rand(0, 99) / 100); 
            
            DB::table('coches')->insert([
                'marca' => $marca,
                'modelo' => $modelo,
                'year' => $year,
                'color' => $color,
                'precio' => $precio
            ]);
        }
    }
}