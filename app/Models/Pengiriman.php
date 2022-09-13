<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'wos';
    protected $fillable =['tgl_terima_fppp','fppp_id','tujuan','acc_pengiriman'];



    public function fppps()
    {
        return $this->belongsTo(Produksi::class,"fppp_id");
    }

    public function getStatusColorAttribute()
    {
        return [
            'ACCEPT' => '#D2FFDC',
            'PENDING' => '#FFCED7',
            'ACCEPT WITH NOTE' => '#FFEAC1'
        ][$this->acc_pengiriman]?? '#DFEAFF';
    }

    public function getStatusTextColorAttribute()
    {
        return [
            'ACCEPT' => '#0ECB38',
            'PENDING' => '#F54A69',
            'ACCEPT WITH NOTE' => '#FFEAC1'
        ][$this->acc_pengiriman]?? '#4891FF';
    }

    public function getDateForHumansAttribute()
    {
        return $this->created_at->format('M, d Y');
    }
}
