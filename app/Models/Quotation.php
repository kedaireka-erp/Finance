<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $table = 'quotations';

    public function detail_quotations(){
        return $this -> hasMany(DetailQuotation::class);
    }
}
