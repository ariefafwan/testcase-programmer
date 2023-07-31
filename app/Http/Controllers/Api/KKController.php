<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KKResource;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;

class KKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return KKResource::collection(KartuKeluarga::all());
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

        $datakk = new KartuKeluarga();
        $datakk->no_kk = $request->no_kk;
        $datakk->village_id = $request->village_id;
        $datakk->img = $request->img;

        $datakk->save();
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

        $datakk = KartuKeluarga::findOrFail($id);
        $datakk->no_kk = $request->no_kk;
        $datakk->village_id = $request->village_id;
        $datakk->img = $request->img;

        $datakk->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $datakk = KartuKeluarga::findOrFail($id);
        $datakk->delete();
    }
}
