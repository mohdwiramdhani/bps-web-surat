<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('dashboard', [
            
            'greeting' => GeneralHelper::greeting(),

        ]);

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
    public function show(Masuk $masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Masuk $masuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Masuk $masuk)
    {
        //
    }
}
