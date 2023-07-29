<?php

namespace App\Http\Controllers;

use App\Exports\KartuKeluargaExport;
use App\Models\District;
use App\Models\KartuKeluarga;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $page = "Dashboard Admin";
        return view('admin.dashboard', compact('page'));
    }

    // public function datakk()
    // {
    //     $datakk = KartuKeluarga::all();

    //     return DataTables::of($datakk)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($datakk) {
    //             return '
    //             <div class="d-flex justify-content-evenly">
    //                 <button onclick="editForm(`' . route('test.update', $datakk->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="bi bi-pencil"></i></button>
    //                 <button onclick="deleteData(`' . route('product.destroy', $datakk->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="bi bi-trash"></i></button>
    //             </div>
    //             ';
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    // }

    public function indexKartuKeluarga(Request $request)
    {
        $page = "Data Kartu Keluarga";
        $datakk = KartuKeluarga::all();
        $province = Province::pluck('name', 'id');
        // $regency = Regency::all();
        // $district = District::all();
        // $village = Village::all();
        return view('admin.datakk.index', compact('page', 'datakk', 'province'));
    }

    public function getregency($id)
    {
        $regency = Regency::where("province_id", $id)->pluck('name', 'id');
        return json_encode($regency);
        // dd($regency);
    }

    public function getdistrict($id)
    {
        $district = District::where("regency_id", $id)->pluck('name', 'id');
        return json_encode($district);
        // dd($district);
    }

    public function getvillage($id)
    {
        $village = Village::where("district_id", $id)->pluck('name', 'id');
        return json_encode($village);
        // dd($village);
    }

    public function exportdatakk()
    {
        return Excel::download(new KartuKeluargaExport, 'kartukeluarga.xlsx');
    }

    public function storedatakk(Request $request)
    {
        $request->validate([
            'no_kk' => ['required', 'numeric', 'min:16', 'unique:' . KartuKeluarga::class],
            'village_id' => ['required', 'numeric', 'gt:0'],
            'img' => ['required', 'mimes:jpeg,png,jpg', 'max:5000'],
        ]);

        $datakk = new KartuKeluarga();
        $datakk->no_kk = $request->no_kk;
        $datakk->village_id = $request->village_id;

        //save file ke storage
        $file = $request->file('img');
        $imgkk = time() . $file->getClientOriginalName();
        $file->storeAs('public/img/', $imgkk);

        $datakk->img = $imgkk;

        $datakk->save();

        Alert::success('Informasi Pesan', 'Berhasil Menambahkan Kartu Keluarga');
        return redirect()->route('kartukeluarga.index');
    }

    public function editdatakk($id)
    {
        $datakk = KartuKeluarga::findOrFail($id);
        $district = District::where('id', $datakk->village->district->id)->pluck('id')->first();
        $regency = Regency::where('id', $datakk->village->regency->id)->pluck('id')->first();
        $province = Province::where('id', $datakk->village->regency->province->id)->pluck('id')->first();
        // dd(json_encode($datakk));

        return json_encode($datakk);
    }

    public function updatedatakk(Request $request)
    {

        $datakk = KartuKeluarga::findOrFail($request->id);

        //membedakan validasi unique no_kk, jikalau di edit, maka tidak boleh sama dengan yang sudah ada
        if ($datakk->no_kk == $request->no_kk) {
            $request->validate([
                'no_kk' => ['required', 'numeric', 'min:16'],
                'village_id' => ['required', 'numeric', 'gt:0'],
                'img' => ['required', 'mimes:jpeg,png,jpg', 'max:5000'],
            ]);
            // dd($request->no_kk);
        } else {
            $request->validate([
                'no_kk' => ['required', 'numeric', 'min:16', 'unique:' . KartuKeluarga::class],
                'village_id' => ['required', 'numeric', 'gt:0'],
                'img' => ['required', 'mimes:jpeg,png,jpg', 'max:5000'],
            ]);
        }

        $datakk->no_kk = $request->no_kk;
        $datakk->village_id = $request->village_id;

        // menghapus yang lama
        if ($request->img) {
            Storage::delete('public/img/' . $datakk->img);
        };

        // save yang baru
        $file = $request->file('img');
        $imgkk = time() . $file->getClientOriginalName();
        $file->storeAs('public/img/', $imgkk);

        $datakk->img = $imgkk;
        $datakk->save();

        Alert::success('Informasi Pesan', 'Berhasil Mengupdate Kartu Keluarga');
        return redirect()->route('kartukeluarga.index');
    }

    public function deletedatakk($id)
    {
        $datakk = KartuKeluarga::findOrFail($id);
        Storage::delete('public/img/' . $datakk->img);
        $datakk->delete();

        Alert::success('Informasi Pesan', 'Berhasil Menghapus Kartu Keluarga');
        return redirect()->route('kartukeluarga.index');
    }
}
