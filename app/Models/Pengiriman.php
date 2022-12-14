<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'fppps';
    protected $fillable =['acc_pengiriman','note_acc'];
    // public $date = ['tgl_pack'];



    // public function fppps()
    // {
    //     return $this->belongsTo(Produksi::class,"fppp_id");
    // }

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
            'ACCEPT WITH NOTE' => '#D88E00'
        ][$this->acc_pengiriman]?? '#4891FF';
    }

    public function getDateForHumansAttribute()
    {
        return Carbon::parse($this->tgl_packing)->format('Y-m-d');
    }
}
