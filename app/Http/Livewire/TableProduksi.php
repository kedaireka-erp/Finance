<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produksi;
use Schema;


class TableProduksi extends Component
{

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $selectedStatus ='';
    public $searchColumnsKode, $searchColumnsNama, $searchColumnsPriceMin, $searchColumnsPriceMax, $searchColumnsCategoryId;

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
        $status = Produksi::groupBy('acc_produksi')
                    ->pluck('acc_produksi');
        $items = Produksi::query()
                    ->where('order_status',"=", 1)
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate();
        return view('livewire.table-produksi',[
            'title' => 'Produksi',
            'ket' => 'Tabel ',
            'items' => $items,
            'status' => $status,
            'icon' => 'precision_manufacturing',
            'columns'=>$columns
        ]);
    }
}

// ->when($this->searchColumnsKode != "", function($q){
//     return $q->where('kode_barang', 'like', '%'.$this->searchColumnsKode.'%');})
// ->when($this->searchColumnsNama != "", function($q){
//     return $q->where('nama_barang', 'like', '%'.$this->searchColumnsNama.'%');})
