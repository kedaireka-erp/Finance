<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TablePengiriman extends Component
{
    public $sortBy = 'work_orders.tanggal_packing';
    public $sortDirection = 'desc';
    public $selectedStatus =null;
    public $date_from =null;
    public $date_to =null;
    public $col_selected = null;
    public $search = null;
    public $status_null = false;

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
            'jumlah_jadi' => 'Item Jadi',
            'jumlah_total' => 'Total Item'
        ];
        $status = ['ACCEPT','PENDING','ACCEPT WITH NOTE'];
        DB::enableQueryLog();
            $items = Pengiriman::select([
                                        'fppps.id',
                                        'work_orders.tanggal_packing',
                                        'proyek_quotations.no_quotation',
                                        'fppps.fppp_no',  
                                        'master_aplikators.aplikator', 
                                        'proyek_quotations.nama_proyek', 
                                        'detail_quotations.lokasi',
                                        'work_orders.acc_pengiriman',
                                        DB::raw( 'COUNT(kode_unit) as jumlah_total'),
                                        DB::raw( 'COUNT(tanggal_packing) as jumlah_jadi')
                                        ])
                    ->join('fppps', 'work_orders.fppp_id','=','fppps.id')
                    ->join('quotations','fppps.quotation_id','=','quotations.id')
                    ->join('detail_quotations','detail_quotations.quotation_id','=','quotations.id')
                    ->join('proyek_quotations','proyek_quotations.id','=','quotations.id')
                    ->join('master_aplikators', 'master_aplikators.kode','=','proyek_quotations.kode_aplikator')
                    ->whereNotNull('work_orders.tanggal_packing') 
                    ->groupBy('work_orders.fppp_id')
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
                    
        return view('pengiriman.index',[
            'title' => 'Pengiriman',
            'ket' => 'Tabel ',
            'items' => $items,
            'status' => $status,
            'icon' => 'local_shipping',
            'columns'=>$columns
        ])->extends('layouts.main')->section('container');
    }

    
    public function edit(Request $request, $id){
        $item = Pengiriman::select([
                                    'fppps.id',
                                    'work_orders.tanggal_packing',
                                    'proyek_quotations.no_quotation',
                                    'fppps.fppp_no',  
                                    'master_aplikators.aplikator', 
                                    'proyek_quotations.nama_proyek', 
                                    'detail_quotations.lokasi',
                                    'work_orders.acc_pengiriman',
                                    'work_orders.note',
                                    DB::raw( 'COUNT(kode_unit) as jumlah_total'),
                                    DB::raw( 'COUNT(tanggal_packing) as jumlah_jadi')
                                    ])
                        ->join('fppps', 'work_orders.fppp_id','=','fppps.id')
                        ->join('quotations','fppps.quotation_id','=','quotations.id')
                        ->join('detail_quotations','detail_quotations.quotation_id','=','quotations.id')
                        ->join('proyek_quotations','proyek_quotations.id','=','quotations.id')
                        ->join('master_aplikators', 'master_aplikators.kode','=','proyek_quotations.kode_aplikator')
                        ->where('fppps.id','=',$id)
                        ->get();
        if($request -> get('status') == 'history'){
            $item = $item;
        }
        $id_update = $id; 
        $status = ['ACCEPT','ACCEPT WITH NOTE'];

        return view('pengiriman.edit',[
            'item' => $item,
            'status' => $status,
            'id' => $id_update
        ]);
        
    }

    public function update(Request $request, $id)
    {
        $item = Pengiriman::find($id);
        $validatedData = $request->validate([
                        'status_select' => 'required'
                    ]);
        $item -> update([
            "acc_pengiriman" => $request -> status_select,
            "note" => $request -> note
        ]);
        
        return redirect('/pengiriman');
        
    }


}
