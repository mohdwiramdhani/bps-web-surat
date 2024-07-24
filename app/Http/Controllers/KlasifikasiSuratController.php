<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiSurat;
use App\Http\Requests\StoreKlasifikasiSuratRequest;
use App\Http\Requests\UpdateKlasifikasiSuratRequest;

class KlasifikasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('klasifikasi-surat.index', [
            'data' => KlasifikasiSurat::latest()->paginate(7)->withQueryString(),
        ]);
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
    public function store(StoreKlasifikasiSuratRequest $request)
    {
        try {
            KlasifikasiSurat::create($request->validated());
            return back()->with('success', 'Berhasil');
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KlasifikasiSurat $klasifikasiSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KlasifikasiSurat $klasifikasiSurat)
    {
        return view('klasifikasi-surat.edit', [
            'klasifikasi' => $klasifikasiSurat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKlasifikasiSuratRequest $request, KlasifikasiSurat $klasifikasiSurat)
    {
        try {
            $klasifikasiSurat->update($request->validated());
            return back()->with('success', 'Berhasil');
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KlasifikasiSurat $klasifikasiSurat)
    {
        try {
            $klasifikasiSurat->delete();
            return back()->with('success', 'Berhasil');
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
