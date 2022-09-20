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
    // public $searchColumnsKode, $searchColumnsNama, $searchColumnsPriceMin, $searchColumnsPriceMax, $searchColumnsCategoryId;
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
                    ->where('status_tagih',0);
        $items_view = $items -> paginate();
        $this->subkons = $items->get()->toArray();
        return view('rekapsubkon.index',[
            'title' => 'Tagihan Subcon',
            'ket' => 'Tabel ',
            'items' => $items_view,
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
            $this->checkedTagih = Resub::pluck('id');
        }else{
            $this->checkedTagih = [];
        }
    }

    public function editedSubkon($subkonIndex)
    {
        $this->editedSubkonIndex = $subkonIndex;
    }

    public function savedSubkon($subkonIndex)
    {
        // $this -> subkons = Resub::select(['jumlah_daun','keliling_kaca','harga_jasa'])->get()->toArray();
        $subkon = ['id'=>$this->subkons[$subkonIndex]['id'] ?? NULL,
                   'jumlah_daun'=>$this->subkons[$subkonIndex]['jumlah_daun'] ?? NULL,
                   'keliling_kaca'=>$this->subkons[$subkonIndex]['keliling_kaca'] ?? NULL,
                   'harga_jasa'=>$this->subkons[$subkonIndex]['harga_jasa'] ?? NULL];
        // $subkon['id'] = $subkonIndex;
        // dd($subkon['id']);
        if (!is_null($subkon)){
             Resub::query()
                ->where('id',$subkon['id'])
                ->update($subkon);
            // if ($editedSubkon) {
            //     $editedSubkon->update($subkon);
            // }
        }
        $this->editedSubkonIndex = null;
    }
}
