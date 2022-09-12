<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wo extends Model
{
    use HasFactory;
    protected $table = 'wos';

    public function fppps(){
        return $this -> belongsTo(Fppp::class,"fppp_id");
    }
}
