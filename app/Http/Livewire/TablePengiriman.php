<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
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
            'quotation_no'=>'No Quotation',
            'fppp_no' => 'No FPPP',
            'applicator_name' => 'Aplikator',
            'project_name' => 'Nama Projek',
            'tujuan' => 'Kota',
            'qty_pack' => 'Item Jadi'
        ];
        $status = ['ACCEPT','PENDING','ACCEPT WITH NOTE'];
            $items = Pengiriman::select(['work_orders.id',
                                        'work_orders.tanggal_packing',
                                        'work_orders.tujuan', 
                                        'work_orders.qty_packing', 
                                        'work_orders.qty', 
                                        'work_orders.acc_pengiriman', 
                                        'fppps.fppp_no', 
                                        'fppps.applicator_name', 
                                        'fppps.project_name',
                                        'quotations.quotation_no'])
                    ->join('fppps', 'work_orders.fppp_id','=','fppps.id')
                    ->join('quotations','fppps.quotation_id','=','quotations.id')
                    ->whereNotNull('qty_packing') 
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
        $item = Pengiriman::select(['work_orders.id',
                            'work_orders.tanggal_packing',
                            'work_orders.tujuan', 
                            'work_orders.qty_packing', 
                            'work_orders.qty', 
                            'work_orders.acc_pengiriman',
                            'work_orders.note',
                            'fppps.fppp_no', 
                            'fppps.applicator_name', 
                            'fppps.project_name',
                            'quotations.quotation_no'])
                    ->join('fppps', 'work_orders.fppp_id','=','fppps.id')
                    ->join('quotations','fppps.quotation_id','=','quotations.id')
                    ->where('work_orders.id','=',$id)
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
        $item = Pengiriman::findorfail($id);
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
