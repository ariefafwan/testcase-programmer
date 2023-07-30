<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function getAlamatLengkapAttribute()
    {
        $alamat =  $this->village->name . ',' . $this->village->district->name . ',' . $this->village->district->regency->name . ',' . $this->village->district->regency->province->name;
        return $alamat;
    }

    public function data_penduduk()
    {
        return $this->hasMany(DataPenduduk::class);
    }
}
