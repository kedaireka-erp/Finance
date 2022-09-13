<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'item';
    protected $fillable =['kode_barang','nama_barang','stock','harga','item_type_id','created_at'];



    public function itemTypes()
    {
        return $this->belongsTo(Item_type::class,"item_type_id");
    }

    public function getStatusColorAttribute()
    {
        return [
            'avalaible' => '#D2FFDC',
            'empty' => '#FFCED7'
        ][$this->status]?? '#DFEAFF';
    }

    public function getStatusTextColorAttribute()
    {
        return [
            'avalaible' => '#0ECB38',
            'empty' => '#F54A69'
        ][$this->status]?? '#4891FF';
    }

    public function getDateForHumansAttribute()
    {
        return $this->created_at->format('M, d Y');
    }
}
