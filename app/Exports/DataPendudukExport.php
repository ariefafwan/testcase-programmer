<?php

namespace App\Exports;

use App\Models\DataPenduduk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataPendudukExport implements FromView
{
    public function view(): View
    {
        return view('admin.datapenduduk.export', [
            'datapenduduk' => DataPenduduk::all()
        ]);
    }
}
