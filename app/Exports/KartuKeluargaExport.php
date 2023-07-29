<?php

namespace App\Exports;

use App\Models\KartuKeluarga;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KartuKeluargaExport implements FromView
{
    public function view(): View
    {
        return view('admin.datakk.export', [
            'datakk' => KartuKeluarga::all()
        ]);
    }
}
