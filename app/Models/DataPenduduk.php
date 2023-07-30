<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function kartu_keluarga()
    {
        return $this->belongsTo(KartuKeluarga::class);
    }

    public function getAlamatLengkapAttribute()
    {
        $alamat =  $this->village->name . ',' . $this->village->district->name . ',' . $this->village->district->regency->name . ',' . $this->village->district->regency->province->name;
        return $alamat;
    }

    public function getTempatTanggalAttribute()
    {
        $ttl =  $this->tempat_lahir . ',' . date("d-m-Y", strtotime($this->tanggal_lahir));
        return $ttl;
    }
}
