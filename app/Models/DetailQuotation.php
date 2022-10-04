<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailQuotation extends Model
{
    use HasFactory;
    protected $table = 'detail_quotations';

    public function quotations(){
            return $this -> belongsTo(Quotation::class);
        }
}

