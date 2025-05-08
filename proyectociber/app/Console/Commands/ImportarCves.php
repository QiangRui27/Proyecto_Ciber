<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Vulnerabilidad;

class ImportarCves extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cve:importar {--cveId=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa CVEs desde la API pública del NVD';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cveId = $this->option('cveId') ?? 'CVE-2023-36052';

        $url = "https://services.nvd.nist.gov/rest/json/cves/2.0";

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            $items = $data['vulnerabilities'] ?? [];

            foreach ($items as $item) {
                $cveData = $item['cve'];

                $id = $cveData['id'] ?? null;
                $descripcion = $cveData['descriptions'][0]['value'] ?? 'Sin descripción';
                $criticidad = $cveData['metrics']['cvssMetricV2'][0]['baseSeverity'] ?? 'Desconocida';
                $cvssp = $cveData['metrics']['cvssMetricV2'][0]['cvssData']['baseScore'] ?? null;
                $nombre = $cveData['titles'][0]['value'] ?? 'Sin título';

                Vulnerabilidad::updateOrCreate(
                    ['cve_id' => $id],
                    [
                        'nombre_vulnerabilidad' => $nombre,
                        'descripcion' => $descripcion,
                        'criticidad' => $criticidad,
                        'cvssp' => $cvssp
                    ]
                );

                $this->info("CVE $id importado o actualizado.");
            }
        } else {
            $this->error('No se pudo acceder a la API.');
        }
    }
}
