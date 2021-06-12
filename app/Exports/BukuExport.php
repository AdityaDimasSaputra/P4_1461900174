<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
class BukuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('buku')
        ->join('rak_buku','buku.id', '=', 'rak_buku.id_buku')
		->join('jenis_buku','rak_buku.id_jenis_buku', '=', 'jenis_buku.id')
        ->select('rak_buku.id','judul','jenis','tahun_terbit')
		->get();
    }
}