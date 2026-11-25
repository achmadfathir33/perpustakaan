<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Throwable;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_buku' => 0,
            'total_anggota' => 0,
            'peminjaman_aktif' => 0,
        ];

        $baseUrl = rtrim((string) config('services.internal_api.base_url', 'http://127.0.0.1:8011'), '/');
        $urls = array_unique([
            $baseUrl . '/api/stats',
            str_replace('127.0.0.1', 'localhost', $baseUrl) . '/api/stats',
        ]);

        foreach ($urls as $url) {
            try {
                $response = Http::connectTimeout(2)->timeout(4)->get($url);

                if ($response->successful()) {
                    $json = $response->json();
                    if (is_array($json)) {
                        $stats = array_merge($stats, $json);
                        break;
                    }
                }
            } catch (Throwable $e) {
            }
        }

        return view('dashboard', compact('stats'));
    }
}