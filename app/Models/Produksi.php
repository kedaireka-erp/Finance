<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'fppps';
    protected $fillable =['created_at','quotation_no','fppp_no','aplicator_name','project_name','acc_produksi'];



    public function wos()
    {
        return $this->hasMany(Pengiriman::class);
    }

    public function getStatusColorAttribute()
    {
        return [
            'ACCEPT' => '#D2FFDC',
            'PENDING' => '#FFCED7'
        ][$this->acc_produksi]?? '#DFEAFF';
    }

    public function getStatusTextColorAttribute()
    {
        return [
            'ACCEPT' => '#0ECB38',
            'PENDING' => '#F54A69'
        ][$this->acc_produksi]?? '#4891FF';
    }

    public function getDateForHumansAttribute()
    {
        return $this->created_at->format('M, d Y');
    }
}
