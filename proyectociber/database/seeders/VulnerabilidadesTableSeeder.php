<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Vulnerabilidad;

class VulnerabilidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vulnerabilidad::create([
            'cve_id' => 'CVE-2023-1234',
            'nombre_vulnerabilidad' => 'Vulnerabilidad de ejemplo 1',
            'descripcion' => 'Descripción de la vulnerabilidad de ejemplo 1.',
            'CVSSP' => 7.5,
            'criticidad' => 'Alta',
            'solucion' => 'Actualizar a la última versión del software.',
            'referencias' => 'https://ejemplo.com/vulnerabilidad1',
        ]);
        Vulnerabilidad::create([
            'cve_id' => 'CVE-2023-5678',
            'nombre_vulnerabilidad' => 'Vulnerabilidad de ejemplo 2',
            'descripcion' => 'Descripción de la vulnerabilidad de ejemplo 2.',
            'CVSSP' => 5.0,
            'criticidad' => 'Media',
            'solucion' => 'Aplicar el parche de seguridad correspondiente.',
            'referencias' => 'https://ejemplo.com/vulnerabilidad2',
        ]);
    }
}
