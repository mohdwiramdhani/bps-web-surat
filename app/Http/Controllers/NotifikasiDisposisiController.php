<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiDisposisi;
use App\Http\Requests\StoreNotifikasiDisposisiRequest;
use App\Http\Requests\UpdateNotifikasiDisposisiRequest;

class NotifikasiDisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notifikasi.index', [

            'data' => NotifikasiDisposisi::latest()->paginate(7)->withQueryString(),

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
    public function store(StoreNotifikasiDisposisiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NotifikasiDisposisi $notifikasiDisposisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotifikasiDisposisi $notifikasiDisposisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotifikasiDisposisiRequest $request, NotifikasiDisposisi $notifikasiDisposisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotifikasiDisposisi $notifikasiDisposisi)
    {
        try {
            $notifikasiDisposisi->delete();
            return back()->with('success', 'Berhasil');
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
