<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class TablePengiriman extends Component
{
    public $sortBy = 'wos.created_at';
    public $sortDirection = 'desc';
    public $selectedStatus ='';
    public $flag = 0;
    public $searchColumnsKode, $searchColumnsNama, $searchColumnsPriceMin, $searchColumnsPriceMax, $searchColumnsCategoryId;


    public function flagging()
    {
        $flag = 1;
        return $flag;
    }

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
        $columns = ['Kode Barang','Nama Barang'];
        $status = Pengiriman::groupBy('acc_pengiriman')
                    ->pluck('acc_pengiriman');
        // $items = Pengiriman::query()
        //             ->with('fppps')
        //             ->whereNotNull('finish_qc')
        //             ->orderBy($this->sortBy, $this->sortDirection)
        //             ->paginate();

        $items = Pengiriman::select(['wos.id','wos.tgl_pack','wos.tujuan', 'wos.tujuan', 'wos.qty_pack', 'wos.acc_pengiriman', 'fppps.quotation_no', 'fppps.fppp_no', 'fppps.applicator_name', 'fppps.project_name'])
                    ->join('fppps', 'wos.fppp_id','=','fppps.id')
                    ->whereNotNull('finish_qc')
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
        // $status_selected = Pengiriman::where('acc_pengiriman')
        //             ->pluck('id','acc_pengiriman');
        // $status_id = str($id);
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
