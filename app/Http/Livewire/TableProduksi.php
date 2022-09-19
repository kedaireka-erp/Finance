<?php

namespace App\Http\Livewire;

use Schema;
use Livewire\Component;
use App\Models\Produksi;
use Illuminate\Support\Facades\Redirect;


class TableProduksi extends Component
{

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    // public $searchColumnsKode, $searchColumnsNama, $searchColumnsPriceMin, $searchColumnsPriceMax, $searchColumnsCategoryId;
    public $status_id ;
    public $selectedStatus =null;
    public $date_from =null;
    public $date_to =null;
    public $col_selected = null;
    public $search = null;
    protected $listeners =[
        'statusChanged'=>'update',
        'statusUndo'=>'update_undo'
    ];

    public function sortBy($columnName)
    {
        if($this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        }else{
            $this->sortDirection = 'asc';
        }
        return $this->sortBy = $columnName;
    }
    public function statusChangedConfirmation($id)
    {
        $this -> status_id = $id;
        $pop = Produksi::find($id);
            if($pop['acc_produksi']=='ACCEPT') {
                $this -> dispatchBrowserEvent('show-status-confirmation1');
            }
            else {
                $this -> dispatchBrowserEvent('show-status-confirmation');
            }
    }


    public function update(){
        Produksi::query()
        ->whereIn('id', [$this->status_id])
        ->update(['acc_produksi' => 'ACCEPT']);
        // $this->dispatchBrowserEvent('statusChanged');
    }

    public function update_undo(){
        Produksi::query()
        ->whereIn('id', [$this->status_id])
        ->update(['acc_produksi' => 'PENDING']);
        // $this->dispatchBrowserEvent('statusChanged');
    }
    
    public function render()
    {
        $columns = [
            'quotation_no'=>'No Quotation',
            'fppp_no' => 'No FPPP',
            'applicator_name ' => 'Aplikator',
            'project_name' => 'Nama Projek'
        ];
        $status = ['ACCEPT','PENDING'];
        $items = Produksi::query()
                    ->where('order_status',"=", 1)
                    ->when($this->col_selected,function($q){
                        $q->where($this->col_selected,"ilike","% $this->search %");
                    })
                    ->when($this->selectedStatus,function($query){
                        $query->where('acc_produksi',$this->selectedStatus);
                    })
                    ->when($this->date_from,function($q){
                        $q->where('created_at','>=',$this -> date_from);
                    })
                    ->when($this->date_to,function($q){
                        $q->where('created_at','<=',$this -> date_to);
                    })
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate();
        return view('produksi.index',[
            'title' => 'Produksi',
            'ket' => 'Tabel ',
            'items' => $items,
            'status' => $status,
            'icon' => 'precision_manufacturing',
            'columns'=>$columns
        ])->extends('layouts.main')->section('container') ;
    }

}

// ->when($this->searchColumnsKode != "", function($q){
//     return $q->where('kode_barang', 'like', '%'.$this->searchColumnsKode.'%');})
// ->when($this->searchColumnsNama != "", function($q){
//     return $q->where('nama_barang', 'like', '%'.$this->searchColumnsNama.'%');})
