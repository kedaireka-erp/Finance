<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resub extends Model
{
    use HasFactory;

    protected $table = 'rekap_subkons';
    protected $fillable =['tgl_tagih','tipe_barang','kode_unit','jumlah_daun','keliling_kaca','harga_jasa','total_biaya'];


    // public function fppps()
    // {
    //     return $this->belongsTo(Produksi::class,"fppp_id");
    // }
    
}
