<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class TablePengiriman extends Component
{
    public $sortBy = 'wos.created_at';
    public $sortDirection = 'desc';
    public $selectedStatus =null;
    public $date_from =null;
    public $date_to =null;
    public $col_selected = null;
    public $search = null;
    // public $searchColumnsKode, $searchColumnsNama, $searchColumnsPriceMin, $searchColumnsPriceMax, $searchColumnsCategoryId;


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
        $items = Pengiriman::select(['wos.id','wos.tgl_pack','wos.tujuan', 'wos.tujuan', 'wos.qty_pack', 'wos.acc_pengiriman', 'fppps.quotation_no', 'fppps.fppp_no', 'fppps.applicator_name', 'fppps.project_name'])
                    ->join('fppps', 'wos.fppp_id','=','fppps.id')
                    ->whereNotNull('finish_qc')
                    ->when($this->col_selected,function($q){
                        $q->where($this->col_selected,"like","%". $this->search ."%");
                    })
                    ->when($this->selectedStatus,function($query){
                        $query->where('acc_pengiriman',$this->selectedStatus);
                        })
                    ->when($this->date_from,function($q){
                        $q->where('tgl_pack','>=',$this -> date_from);
                    })
                    ->when($this->date_to,function($q){
                        $q->where('tgl_pack','<=',$this -> date_to);
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

    public function edit($id){
        $item = Pengiriman::select(['wos.id as id ','wos.tgl_pack','wos.tujuan', 'wos.tujuan', 'wos.qty_pack', 'wos.acc_pengiriman','wos.note', 'fppps.quotation_no', 'fppps.fppp_no', 'fppps.applicator_name', 'fppps.project_name'])
                    ->join('fppps', 'wos.fppp_id','=','fppps.id')
                    ->where('wos.id','=',$id)
                    ->get();
        $id_update = $id; 
        $status = ['ACCEPT','PENDING','ACCEPT WITH NOTE'];
        return view('pengiriman.edit',[
            'item' => $item,
            'status' => $status,
            'id' => $id_update
        ]);
        
    }

    public function update(Request $request, $id)
    {
        $item = Pengiriman::findorfail($id);
        $item -> update([
            "acc_pengiriman" => $request -> status_select,
            "note" => $request -> note
        ]);
        return redirect('/pengiriman');
    }


}
