<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private string $base = 'https://equran.id/api/v2/shalat';
 
    public function index(Request $request)
    {
        $provinsi = $request->query('provinsi', 'Jawa Barat');
        $kabkota  = $request->query('kabkota', 'Kota Bogor');
 
        // Daftar provinsi hampir tidak berubah, simpan 1 hari
        $daftarProvinsi = Cache::remember('jadwal.provinsi', 86400, fn () =>
            Http::get($this->base . '/provinsi')->json('data')
        );
 
        $daftarKabkota = Cache::remember("jadwal.kabkota.$provinsi", 86400, fn () =>
            Http::post($this->base . '/kabkota', ['provinsi' => $provinsi])->json('data')
        );
 
        // Jadwal sebulan, simpan 1 hari supaya API tidak dipanggil di setiap kunjungan
        $bulan = now()->month;
        $tahun = now()->year;
 
        $data = Cache::remember("jadwal.$provinsi.$kabkota.$tahun-$bulan", 86400, fn () =>
            Http::post($this->base, [
                'provinsi' => $provinsi,
                'kabkota'  => $kabkota,
                'bulan'    => $bulan,
                'tahun'    => $tahun,
            ])->json('data')
        );
 
        // Jika nama provinsi/kabkota tidak cocok, data bernilai null
        $hariIni = $data
            ? collect($data['jadwal'])->firstWhere('tanggal', now()->day)
            : null;
 
        return view('jadwal', compact(
            'daftarProvinsi', 'daftarKabkota', 'provinsi', 'kabkota', 'data', 'hariIni'
        ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
