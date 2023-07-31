<?php

namespace App\Charts;

use App\Models\DataPenduduk;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PendudukLakiChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $check = DataPenduduk::where('jenis_kelamin', 'L')->count();
        if ($check >= 1) {

            $datapenduduk = DataPenduduk::where('jenis_kelamin', 'L')
                ->select('jenis_kelamin', 'village_id')
                ->selectRaw("COUNT(jenis_kelamin) as total_jenis_kelamin")
                ->groupBy('jenis_kelamin', 'village_id')
                ->orderBy('village_id', 'desc')
                ->get();

            // $villagename = Da::has('data_penduduk')->distinct()->orderBy('id', 'DESC')->get();

            // foreach ($villagename as $row => $village) {
            //     $datavillage[] = $village->name;
            // }

            foreach ($datapenduduk as $index => $datap) {
                $jeniskelamin[] = $datap->total_jenis_kelamin;
                $datavillage[] = $datap->village->name;
            }
            // dd($datapenduduk);
            return $this->chart->pieChart()
                ->setTitle('Jumlah Penduduk Berjenis Kelamin Laki-Laki')
                ->setSubtitle('Per/Kelurahan')
                ->addData($jeniskelamin)
                ->setLabels($datavillage);
        } else {
            return $this->chart->pieChart()
                ->setTitle('Data Penduduk Belum Laki-Laki Diketahui')
                ->setSubtitle('Per/Kelurahan')
                ->addData([''])
                ->setLabels(['']);
        }
    }
}
