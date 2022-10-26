<?php

namespace App\Http\Livewire;

use Schema;
use Livewire\Component;
use App\Models\Produksi;
use Illuminate\Support\Facades\Redirect;


class TableProduksi extends Component
{

    public $sortBy = 'proyek_quotations.date';
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
            'no_quotation'=>'No Quotation',
            'fppp_no' => 'No FPPP',
            'aplikator' => 'Aplikator',
            'nama_proyek' => 'Nama Projek'
        ];
        $status = ['ACCEPT','PENDING'];
        $items = Produksi::select([ 'fppps.id',
                                    'proyek_quotations.date',
                                    'proyek_quotations.no_quotation',
                                    'fppps.fppp_no',
                                    'master_aplikators.aplikator',
                                    'proyek_quotations.nama_proyek',
                                    'fppps.acc_produksi'])
                    ->join('proyek_quotations','proyek_quotations.id','=','fppps.quotation_id')
                    ->join('master_aplikators','proyek_quotations.kode_aplikator','=','master_aplikators.kode')
                    ->when($this->col_selected,function($q){
                        $q->where($this->col_selected,"like","%". $this->search ."%");
                    })
                    ->when($this->selectedStatus,function($query){
                        $query->where('fppps.acc_produksi',$this->selectedStatus);
                    })
                    ->when($this->date_from,function($q){
                        $q->where('proyek_quotations.date','>=',$this -> date_from);
                    })
                    ->when($this->date_to,function($q){
                        $q->where('proyek_quotations.date','<=',$this -> date_to);
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
