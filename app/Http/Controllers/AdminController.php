<?php

namespace App\Http\Controllers;

use App\Charts\JenisKelaminPendududkChart;
use App\Charts\PendudukLakiChart;
use App\Charts\PendudukPerempuanChart;
use App\Exports\DataPendudukExport;
use App\Exports\KartuKeluargaExport;
use App\Models\DataPenduduk;
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
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(PendudukPerempuanChart $chartperempuan, PendudukLakiChart $chartlaki)
    {
        $page = "Dashboard Admin";
        $grafikp = $chartperempuan->build();
        $grafikl = $chartlaki->build();
        $totalpenduduk = DataPenduduk::all()->count();
        $totalkk = KartuKeluarga::all()->count();
        $totalkelurahan = Village::all()->count();
        return view('admin.dashboard', compact('page', 'grafikp', 'grafikl', 'totalpenduduk', 'totalkk', 'totalkelurahan'));
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

    public function indexKartuKeluarga()
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

    public function indexdatapenduduk()
    {
        $datap = DataPenduduk::all();
        $page = "Daftar Penduduk";
        $province = Province::pluck('name', 'id');
        $kartukeluarga = KartuKeluarga::pluck('no_kk', 'id');
        return view('admin.datapenduduk.index', compact('datap', 'page', 'province', 'kartukeluarga'));
        // dd(PendudukResource::collection(DataPenduduk::all()));
    }

    public function createdatapenduduk()
    {
        $page = "Create Data Penduduk";
        $province = Province::pluck('name', 'id');
        $kartukeluarga = KartuKeluarga::pluck('no_kk', 'id');
        return view('admin.datapenduduk.create', compact('page', 'province', 'kartukeluarga'));
    }

    public function storedatapenduduk(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nik.*' => ['required', 'numeric', 'min:16'],
            'kartu_keluarga_id.*' => ['required', 'numeric', 'gt:0'],
            'name.*' => ['required'],
            'tempat_lahir.*' => ['required'],
            'tanggal_lahir.*' => ['required'],
            'jenis_kelamin.*' => ['required'],
            'village_id.*' => ['required', 'numeric', 'gt:0'],
            'pekerjaan.*' => ['required'],
            //nmr hp matches =  +62817737669 | 62817737669 | 0817737669 | 62821995500 | 0821995500 | 08401998866
            'nomor_hp.*' => ['required', 'regex:/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/', 'min:10'],
            'agama.*' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('admin/createdatapenduduk')
                ->withErrors($validator)
                ->withInput();
        } else {
            for ($i = 0; $i < count($request->nik); $i++) {
                $datap = new DataPenduduk();
                $datap->nik = $request->nik[$i];
                $datap->kartu_keluarga_id = $request->kartu_keluarga_id[$i];
                $datap->nama = $request->nama[$i];
                $datap->tempat_lahir = $request->tempat_lahir[$i];
                $datap->tanggal_lahir = $request->tanggal_lahir[$i];
                $datap->jenis_kelamin = $request->jenis_kelamin[$i];
                $datap->village_id = $request->village_id[$i];
                $datap->pekerjaan = $request->pekerjaan[$i];
                $datap->nomor_hp = $request->nomor_hp[$i];
                $datap->agama = $request->agama[$i];

                $datap->save();
            }
        }

        Alert::success('Informasi Pesan', 'Berhasil Menambahkan Data Penduduk');
        return redirect()->route('datapenduduk.index');
    }

    public function editdatapenduduk($id)
    {
        $datap = DataPenduduk::findOrFail($id);
        $district = District::where('id', $datap->village->district->id)->pluck('id')->first();
        $regency = Regency::where('id', $datap->village->regency->id)->pluck('id')->first();
        $province = Province::where('id', $datap->village->regency->province->id)->pluck('id')->first();
        // $kartukeluarga = KartuKeluarga::where('id', $datap->kartu_keluarga_id)->pluck('id')->first();
        // dd(json_encode($datakk));

        return json_encode($datap);
    }

    public function updatedatapenduduk(Request $request)
    {

        $datap = DataPenduduk::findOrFail($request->id);

        //membedakan validasi unique nik, jikalau di edit, maka tidak boleh sama dengan yang sudah ada
        if ($datap->nik == $request->nik) {
            $request->validate([
                'nik' => ['required', 'numeric', 'min:16'],
                'kartu_keluarga_id' => ['required', 'numeric', 'gt:0'],
                'nama' => ['required'],
                'tempat_lahir' => ['required'],
                'tanggal_lahir' => ['required'],
                'village_id' => ['required', 'numeric', 'gt:0'],
                'pekerjaan' => ['required'],
                //nmr hp matches =  +62817737669 | 62817737669 | 0817737669 | 62821995500 | 0821995500 | 08401998866
                'nomor_hp' => ['required', 'regex:/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/', 'min:10'],
                'agama' => ['required'],
            ]);
            // dd($request->no_kk);
        } else {
            $request->validate([
                'nik' => ['required', 'numeric', 'min:16', 'unique:' . DataPenduduk::class],
                'kartu_keluarga_id' => ['required', 'numeric', 'gt:0'],
                'nama' => ['required'],
                'tempat_lahir' => ['required'],
                'tanggal_lahir' => ['required'],
                'jenis_kelamin' => ['required'],
                'village_id' => ['required', 'numeric', 'gt:0'],
                'pekerjaan' => ['required'],
                'nomor_hp' => ['required', 'regex:/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/', 'min:10'],
                'agama' => ['required'],
            ]);
        }

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

        Alert::success('Informasi Pesan', 'Berhasil Mengupdate Data Penduduk');
        return redirect()->route('datapenduduk.index');
    }

    public function deletedatapenduduk($id)
    {
        $datap = DataPenduduk::findOrFail($id);
        $datap->delete();

        Alert::success('Informasi Pesan', 'Berhasil Menghapus Data Penduduk');
        return redirect()->route('datapenduduk.index');
    }

    public function exportdatapenduduk()
    {
        return Excel::download(new DataPendudukExport, 'datapenduduk.xlsx');
    }
}
