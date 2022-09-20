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
    public $selectAll = false;
    public $editedSubkonIndex = null;
    public $subkons =[];


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

        return view('rekapsubkon.index',[
            'title' => 'Tagihan Subcon',
            'ket' => 'Tabel ',
            'items' => $items,
            'icon' => 'groups',
            'columns'=>$columns
        ])->extends('layouts.main')->section('container') ;
    }

    public function Approve(){
        Resub::query()
            ->whereIn('id', $this->checkedTagih)
            ->update([
                    'tgl_tagih' => Carbon::now(),
                    'status_tagih' => 1,
        ]);
        $this->checkedTagih =[];
        $this->selectAll = false;
        // return Redirect::back();
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->checkedTagih = Resub::where('status_tagih',0)->pluck('id');
        }else{
            $this->checkedTagih = [];
        }
    }

    public function editedSubkon($subkonIndex)
    {
        $this->editedSubkonIndex = $subkonIndex;
    }

    // public function savedSubkon($subkonIndex)
    // {
    //     $this -> subkons = Resub::select(['jumlah_daun','keliling_kaca','harga_jasa'])->get()->toArray();
    //     // dd($this -> subkons);
    //     $subkon = $this->subkons[$subkonIndex] ?? NULL;
    //     if (!is_null($subkon)){
    //         $editedSubkon = Resub::find($subkon['id']);
    //         if ($editedSubkon) {
    //             $editedSubkon->update($subkon);
    //         }
    //     }
    //     $this->savedSubkonIndex = null;
    // }
}
