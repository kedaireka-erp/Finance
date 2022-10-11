<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fppp;
use App\Models\WorkOrder;


class Dashboard extends Component
{
    public function render()
    {
        $data = Fppp::get();
        $acc_pengiriman = Fppp::where('acc_pengiriman', 1)->get();
        $pending_pengiriman = Fppp::where('acc_pengiriman', 3)->get();
        $acc_withnote = Fppp::where('acc_pengiriman', 2)->get();
        // $produksi = Fppp::get();
        $acc_produksi = Fppp::where('acc_produksi', 1)->get();
        $pending_produksi = Fppp::where('acc_produksi', 2)->get();
        return view('dashboard.dashboard',[
            'title' => 'Dashboard',
            'pengiriman' => $data,
            'acc_pengiriman' => $acc_pengiriman,
            'pending_pengiriman' => $pending_pengiriman,
            'acc_withnote' => $acc_withnote,
            'produksi' => $data,
            'acc_produksi' => $acc_produksi,
            'pending_produksi' => $pending_produksi,
        ])->extends('layouts.main')->section('container');
    }
}
