<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fppp;
use App\Models\Wo;


class Dashboard extends Component
{
    public function render()
    {
        $datapengiriman = Wo::groupby('fppp_id');
        $pengiriman = $datapengiriman -> get();
        $acc_pengiriman = Wo::groupby('fppp_id')->having('acc_pengiriman','=', 1)->get();
        $pending_pengiriman = Wo::groupby('fppp_id')->having('acc_pengiriman','=', 2)->get();
        $acc_withnote = Wo::groupby('fppp_id')->having('acc_pengiriman','=', 3)->get();
        $produksi = Fppp::get();
        $acc_produksi = Fppp::where('acc_produksi', 1)->get();
        $pending_produksi = Fppp::where('acc_produksi', 2)->get();
        return view('dashboard.dashboard',[
            'title' => 'Dashboard',
            'pengiriman' => $pengiriman,
            'acc_pengiriman' => $acc_pengiriman,
            'pending_pengiriman' => $pending_pengiriman,
            'acc_withnote' => $acc_withnote,
            'produksi' => $produksi,
            'acc_produksi' => $acc_produksi,
            'pending_produksi' => $pending_produksi,
        ])->extends('layouts.main')->section('container');
    }
}
