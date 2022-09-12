<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resub extends Model
{
    use HasFactory;

    protected $table = 'wos';
    protected $fillable =['fppp_id','tgl_terima_fppp','tgl_tagih','tipe_barang','kode_unit'];


    public function fppps()
    {
        return $this->belongsTo(Produksi::class,"fppp_id");
    }
    
}
