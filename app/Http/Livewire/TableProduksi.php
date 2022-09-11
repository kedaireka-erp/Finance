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
    public $selectedStatus ='';
    public $searchColumnsKode, $searchColumnsNama, $searchColumnsPriceMin, $searchColumnsPriceMax, $searchColumnsCategoryId;
    public $status_id ;
    protected $listeners =[
        'statusChanged'=>'update'
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

<<<<<<< HEAD
<<<<<<< Updated upstream
=======
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
=======
    public function statusChangedConfirmation($id)
    {
        $this -> status_id = $id;
        $this -> dispatchBrowserEvent('show-status-confirmation');
>>>>>>> main
    }


    public function update(){
        Produksi::query()
        ->whereIn('id', [$this->status_id])
        ->update(['acc_produksi' => 'ACCEPT']);
        // $this->dispatchBrowserEvent('statusChanged');
    }

<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> main
    public function render()
    {
        $columns = ['Kode Barang','Nama Barang'];
        $status = Produksi::groupBy('acc_produksi')
                    ->pluck('acc_produksi');
        $items = Produksi::query()
                    ->where('order_status',"=", 1)
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

    public function Approve($id){
        $info = Produksi::find($id)
            ->update([
                    'acc_produksi' => 'ACCEPT',
        ]);

            return Redirect::back();
    }
}

// ->when($this->searchColumnsKode != "", function($q){
//     return $q->where('kode_barang', 'like', '%'.$this->searchColumnsKode.'%');})
// ->when($this->searchColumnsNama != "", function($q){
//     return $q->where('nama_barang', 'like', '%'.$this->searchColumnsNama.'%');})
