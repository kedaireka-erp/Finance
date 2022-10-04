<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryPengiriman extends Component
{
    public $sortBy = 'work_orders.tanggal_packing';
    public $sortDirection = 'desc';
    public $selectedStatus =null;
    public $date_from =null;
    public $date_to =null;
    public $col_selected = null;
    public $search = null;

    public function sortBy($columnName)
    {
        if($this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        }else{
            $this->sortDirection = 'asc';
        }
        return $this->sortBy = $columnName;
    }

    public function render()
    {
        $columns = [
            'no_quotation'=>'No Quotation',
            'fppp_no' => 'No FPPP',
            'aplikator' => 'Aplikator',
            'nama_proyek' => 'Nama Projek',
            'kota' => 'Kota',
            'jumlah_jadi' => 'Item Jadi',
            'jumlah_total' => 'Total Item'
        ];
        $status = ['ACCEPT','ACCEPT WITH NOTE'];
        $items = Pengiriman::select([
                        'work_orders.tanggal_packing',
                        'proyek_quotations.no_quotation',
                        'fppps.fppp_no', 
                        'work_orders.qty_packing', 
                        'master_aplikators.aplikator', 
                        'proyek_quotations.nama_proyek', 
                        'detail_quotations.kota'])
            ->select(DB::raw("COUNT(work_orders.kode_unit) as jumlah_total"))
            ->select(DB::raw("COUNT(work_orders.tanggal_packing) as jumlah_jadi"))
            ->join('work_orders', 'work_orders.fppp_id','=','fppps.id')
            ->join('quotations','fppps.quotation_id','=','quotations.id')
            ->join('detail_quotations','detail_quotations.quotation_id','=','quotations.id')
            ->whereNotNull('work_orders.tanggal_packing') 
            ->whereNot('acc_pengiriman','=','PENDING')
            ->when($this->col_selected,function($q){
                $q->where($this->col_selected,"like","%". $this->search ."%");
            })
            ->when($this->selectedStatus,function($query){
                $query->where('acc_pengiriman',$this->selectedStatus);
                })
            ->when($this->date_from,function($q){
                $q->where('tanggal_packing','>=',$this -> date_from);
            })
            ->when($this->date_to,function($q){
                $q->where('tanggal_packing','<=',$this -> date_to);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate();

            return view('pengiriman.history',[
                'title' => 'Pengiriman',
                'ket' => 'Tabel ',
                'items' => $items,
                'status' => $status,
                'icon' => 'local_shipping',
                'columns'=>$columns
            ])->extends('layouts.main')->section('container');
    }
}