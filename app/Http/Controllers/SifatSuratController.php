<?php

namespace App\Http\Controllers;

use App\Models\SifatSurat;
use App\Http\Requests\StoreSifatSuratRequest;
use App\Http\Requests\UpdateSifatSuratRequest;

class SifatSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sifat-surat.index', [
            'data' => SifatSurat::latest()->paginate(7)->withQueryString(),
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
    public function store(StoreSifatSuratRequest $request)
    {
        try {
            SifatSurat::create($request->validated());
            return back()->with('success', 'Berhasil');
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SifatSurat $sifatSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SifatSurat $sifatSurat)
    {
        return view('sifat-surat.edit', [
            'sifat' => $sifatSurat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSifatSuratRequest $request, SifatSurat $sifatSurat)
    {
        try {
            $sifatSurat->update($request->validated());
            return back()->with('success', 'Berhasil');
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SifatSurat $sifatSurat)
    {
        try {
            $sifatSurat->delete();
            return back()->with('success', 'Berhasil');
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
