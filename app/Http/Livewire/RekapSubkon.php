<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Resub;

class RekapSubkon extends Component
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
        $items = Resub::query()
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate();
                    
        return view('livewire.rekap-subkon',[
            'title' => 'Tagihan Subcon',
            'ket' => 'Tabel ',
            'items' => $items,
            'icon' => 'groups',
            'columns'=>$columns
        ]);
    }
}
