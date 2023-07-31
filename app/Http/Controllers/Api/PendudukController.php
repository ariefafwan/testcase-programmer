<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PendudukResource;
use App\Models\DataPenduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PendudukResource::collection(DataPenduduk::all());
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
        $datap = new DataPenduduk();
        $datap->nik = $request->nik;
        $datap->kartu_keluarga_id = $request->kartu_keluarga_id;
        $datap->nama = $request->nama;
        $datap->tempat_lahir = $request->tempat_lahir;
        $datap->tanggal_lahir = $request->tanggal_lahir;
        $datap->jenis_kelamin = $request->jenis_kelamin;
        $datap->village_id = $request->village_id;
        $datap->pekerjaan = $request->pekerjaan;
        $datap->nomor_hp = $request->nomor_hp;
        $datap->agama = $request->agama;

        $datap->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new PendudukResource($id);
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
        $datap = DataPenduduk::findOrFail($id);
        $datap->nik = $request->nik;
        $datap->kartu_keluarga_id = $request->kartu_keluarga_id;
        $datap->nama = $request->nama;
        $datap->tempat_lahir = $request->tempat_lahir;
        $datap->tanggal_lahir = $request->tanggal_lahir;
        $datap->jenis_kelamin = $request->jenis_kelamin;
        $datap->village_id = $request->village_id;
        $datap->pekerjaan = $request->pekerjaan;
        $datap->nomor_hp = $request->nomor_hp;
        $datap->agama = $request->agama;

        $datap->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datap = DataPenduduk::findOrFail($id);
        $datap->delete();
    }
}
