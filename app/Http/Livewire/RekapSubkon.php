<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Resub;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class RekapSubkon extends Component
{
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $selectedStatus ='';
    public $checkedTagih =[];
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
                    ->where('status_tagih',0)
                    ->paginate();

        return view('livewire.rekap-subkon',[
            'title' => 'Tagihan Subcon',
            'ket' => 'Tabel ',
            'items' => $items,
            'icon' => 'groups',
            'columns'=>$columns
        ]);
    }

    public function Approve(){
        Resub::query()
            ->whereIn('id', $this->checkedTagih)
            ->update([
                    'tgl_tagih' => Carbon::now(),
                    'status_tagih' => 1,
        ]);

            return Redirect::back();
    }
}
