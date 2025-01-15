<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scrap;
use Illuminate\Support\Facades\Http;
use DOMDocument;
use Exception;

class ScrapController extends Controller
{
    public function showIndex(){
        return view('index');
    }

    public function scrape(Request $request)
    {
        // Validasi input
        $request->validate([
            'website_link' => 'required|url',
            'dataset_id' => 'required|integer'
        ]);

        $websiteLink = $request->input('website_link');
        $datasetId = $request->input('dataset_id');
        
        $scrapResult = [
            'title' => null,
            'backdoor' => null,
            'vulnerability_level' => null,
            'deskripsi' => null,
            'waktu' => null
        ];

        try {
            // Mengambil konten halaman
            $response = Http::get($websiteLink);

            if ($response->ok()) {
                $htmlContent = $response->body();

                // Parse HTML untuk mendapatkan title
                $dom = new DOMDocument();
                @$dom->loadHTML($htmlContent);
                $title = $dom->getElementsByTagName('title')->item(0)->nodeValue;

                // Pengecekan backdoor sederhana
                $backdoorKeywords = ['eval(', 'base64_decode', 'shell_exec', 'passthru', 'system', 'exec'];
                $foundBackdoor = null;
                $vulnerabilityLevel = 1;
                $suggestions = [];
                $attackTimestamp = null;

                foreach ($backdoorKeywords as $keyword) {
                    if (strpos($htmlContent, $keyword) !== false) {
                        $foundBackdoor = 'Potential backdoor found';
                        $vulnerabilityLevel = 15; // Tingkat kerentanan tertinggi
                        $attackTimestamp = now(); // Waktu serangan
                        $suggestions[] = 'Remove suspicious code like ' . $keyword . ' from the source code.';
                        break;
                    }
                }

                // Jika tidak ditemukan backdoor
                if (!$foundBackdoor) {
                    $suggestions[] = 'Regularly update and patch the server and CMS.';
                    $suggestions[] = 'Implement a web application firewall (WAF).';
                }

                // Simpan ke database
                $scrap = Scrap::create([
                    'dataset_id' => $datasetId,
                    'website_link' => $websiteLink,
                    'title' => $title,
                    'backdoor' => $foundBackdoor,
                    'level' => $vulnerabilityLevel,
                    'deskripsi' => implode("; ", $suggestions),
                    'waktu' => $attackTimestamp
                ]);

                $scrapResult = [
                    'title' => $title,
                    'backdoor' => $foundBackdoor,
                    'level' => $vulnerabilityLevel,
                    'deskripsi' => $suggestions,
                    'waktu' => $attackTimestamp
                ];
            } else {
                return response()->json(['error' => 'Failed to fetch the website content'], 500);
            }

        } catch (Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }

        return response()->json($scrapResult);
    }
}
