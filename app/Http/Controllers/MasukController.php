<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use App\Models\SifatSurat;
use App\Models\KlasifikasiSurat;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreMasukRequest;
use App\Http\Requests\UpdateMasukRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('surat.masuk.index', [

            'data' => Masuk::latest()->paginate(7)->withQueryString(),
            'search' => $request->search,
           

    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat.masuk.create', [

            'klasifikasis' => KlasifikasiSurat::all(),
            'sifats' => SifatSurat::all()
           

    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMasukRequest $request)
    {

        $user = auth()->user();

        $validatedData = $request->validate([
            'nomor_surat' => ['required','unique:masuks'],
            'tanggal_surat' => ['required'],
            'tanggal_terima' => ['required'],
            'nomor_agenda' => ['required'],
            'isi_ringkasan' => ['required'],
            'pengirim' => ['required'],
            'keterangan' => ['nullable'],
            'kode_klasifikasi' => ['required'],
            'sifat_surat' => ['required'],
            'lampiran' => ['required','mimes:jpg,jpeg,png,pdf']
        ]);

        if($request->file('lampiran')) {

            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran-file');

        }

        $validatedData['user_id'] = $user->id;

        Masuk::create($validatedData);

        
        return redirect('/surat/masuk')->with('success', 'Data berhasil ditambahkan!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Masuk $masuk)
    {
        return view('surat.masuk.show', [
            'masuk' => $masuk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Masuk $masuk)
    {
        return view('surat.masuk.edit', [
            'masuk' => $masuk,
            'klasifikasis' => KlasifikasiSurat::all(),
            'sifats' => SifatSurat::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasukRequest $request, Masuk $masuk)
    {

        $rules = [
            // 'nomor_surat' => ['required','unique:masuks'],
            'tanggal_surat' => ['required'],
            'tanggal_terima' => ['required'],
            'nomor_agenda' => ['required'],
            'isi_ringkasan' => ['required'],
            'pengirim' => ['required'],
            'keterangan' => ['nullable'],
            'kode_klasifikasi' => ['required'],
            'sifat_surat' => ['required'],
            'lampiran' => ['mimes:jpg,jpeg,png,pdf']
        ];

        if($request->nomor_surat != $masuk->nomor_surat){
            $rules['nomor_surat'] = 'required|unique:masuks';
        }

        $validatedData = $request->validate($rules);

        if($request->file('lampiran')) {

            if($request->oldLampiran) {

                Storage::delete($request->oldLampiran);

            }

            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran-file');

        }

        $validatedData['user_id'] = auth()->user()->id;

        Masuk::where('id', $masuk->id)
                ->update($validatedData);

        return redirect('/surat/masuk')->with('success', 'Post Edited');

    }

    public function agenda(Request $request)
    {
        return view('agenda.masuk.index', [
            
            'data' => Masuk::latest()->paginate(7)->withQueryString(),

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Masuk $masuk)
    {
        if($masuk->lampiran) {

            Storage::delete($masuk->lampiran);

        }
        Masuk::destroy($masuk->id);

        return redirect('/surat/masuk')->with('success', 'Berhasil Hapus');
    }
}
