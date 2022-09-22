<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Resub extends Model
{
    use HasFactory;

    protected $table = 'rekap_subkons';
    protected $fillable =['tgl_tagih','tipe_barang','kode_unit','jumlah_daun','keliling_kaca','harga_jasa','total_biaya'];


    // public function fppps()
    // {
    //     return $this->belongsTo(Produksi::class,"fppp_id");
    // }
    
    public function getAssemblyDate1Attribute()
    {
        return Carbon::parse($this->tanggal_assembly1)->format('M, d Y');
    }
    public function getAssemblyDate2Attribute()
    {
        return Carbon::parse($this->tanggal_assembly2)->format('M, d Y');
    }
    public function getAssemblyDate3Attribute()
    {
        return Carbon::parse($this->tanggal_assembly3)->format('M, d Y');
    }
    public function getAssemblyTagihDateAttribute()
    {
        return Carbon::parse($this->tgl_tagih)->format('M, d Y');
    }
}
