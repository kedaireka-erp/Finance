<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pengiriman;

class TablePengiriman extends Component
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
        $status = Pengiriman::groupBy('acc_pengiriman')
                    ->pluck('acc_pengiriman');
        $items = Pengiriman::query()
                    ->whereNotNull('finish_qc')
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate();
                    
        return view('livewire.table-pengiriman',[
            'title' => 'Pengiriman',
            'ket' => 'Tabel ',
            'items' => $items,
            'status' => $status,
            'icon' => 'local_shipping',
            'columns'=>$columns
        ]);
    }
}
