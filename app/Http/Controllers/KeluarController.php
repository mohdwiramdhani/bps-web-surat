<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use App\Models\SifatSurat;
use App\Models\KlasifikasiSurat;
use App\Http\Requests\StoreKeluarRequest;
use App\Http\Requests\UpdateKeluarRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('surat.keluar.index', [

            'data' => Keluar::all()
           

    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat.keluar.create', [

            'klasifikasis' => KlasifikasiSurat::all(),
            'sifats' => SifatSurat::all()
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKeluarRequest $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'nomor_surat' => ['required','unique:keluars'],
            'nomor_agenda' => ['required'],
            'tujuan' => ['required'],
            'tanggal_surat' => ['required'],
            'isi_ringkasan' => ['required'],
            'keterangan' => ['nullable'],
            'kode_klasifikasi' => ['required'],
            'sifat_surat' => ['required'],
            'lampiran' => ['required','mimes:jpg,jpeg,png,pdf']
        ]);

        if($request->file('lampiran')) {

            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran-file');

        }

        $validatedData['user_id'] = $user->id;

        Keluar::create($validatedData);

        return redirect('/surat/keluar')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keluar $keluar)
    {
        return view('surat.keluar.show', [
            'keluar' => $keluar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keluar $keluar)
    {
        return view('surat.keluar.edit', [
            'keluar' => $keluar,
            'klasifikasis' => KlasifikasiSurat::all(),
            'sifats' => SifatSurat::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeluarRequest $request, Keluar $keluar)
    {
        $rules = [
            // 'nomor_surat' => ['required','unique:masuks'],
            'tanggal_surat' => ['required'],
            'nomor_agenda' => ['required'],
            'isi_ringkasan' => ['required'],
            'tujuan' => ['required'],
            'keterangan' => ['nullable'],
            'kode_klasifikasi' => ['required'],
            'sifat_surat' => ['required'],
            'lampiran' => ['mimes:jpg,jpeg,png,pdf']
        ];

        if($request->nomor_surat != $keluar->nomor_surat){
            $rules['nomor_surat'] = 'required|unique:keluars';
        }

        $validatedData = $request->validate($rules);

        if($request->file('lampiran')) {

            if($request->oldLampiran) {

                Storage::delete($request->oldLampiran);

            }

            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran-file');

        }

        $validatedData['user_id'] = auth()->user()->id;

        Keluar::where('id', $keluar->id)
                ->update($validatedData);

        return redirect('/surat/keluar')->with('success', 'Post Edited');
    }

    public function agenda(Request $request)
    {
        return view('agenda.keluar.index', [
            
            'data' => Keluar::latest()->paginate(7)->withQueryString(),

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keluar $keluar)
    {
        if($keluar->lampiran) {

            Storage::delete($keluar->lampiran);

        }
        Keluar::destroy($keluar->id);

        return redirect('/surat/keluar')->with('success', 'Berhasil Hapus');
    }
}
