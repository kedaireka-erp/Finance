<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Resub;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class RekapSubkon extends Component
{
    public $sortBy = 'rekap_subkons.created_at';
    public $sortDirection = 'desc';
    public $selectedJob =null;
    public $checkedTagih =[];
    public $selectAll = false;
    public $editedSubkonIndex = null;
    public $subkons =[];
    public $assembly = 1;
    public $col_selected = null;
    public $search = null;


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
        $kode_assembly = [
            1 => 'Kode Assembly 1',
            2 => 'Kode Assembly 2',
            3 => 'Kode Assembly 3'
        ];
        $job = ['Assembly','Las','Cek Opening','Pasang Kaca','Sealant Kaca'];
        $columns = [
            'fppp_no' => 'No FPPP',
            'project_name' => ' Nama Projek',
            'nama_item' => 'Tipe Barang',
            'warna' => 'Warna',
            'kode_unit' => 'Kode Unit',
            'jumlah_daun' => 'Jumlah Daun',
            'keliling_kaca' => 'Keliling Kaca',
            'harga_jasa' => 'Harga Jasa',
            'total_biaya' => 'Total Biaya'
        ];
        $items = Resub::select([
                        'rekap_subkons.id',
                        'rekap_subkons.jumlah_daun',
                        'rekap_subkons.keliling_kaca',
                        'rekap_subkons.total_biaya',
                        'rekap_subkons.harga_jasa',
                        'rekap_subkons.tgl_tagih',
                        'rekap_subkons.work_order_id',
                        'rekap_subkons.assembly_id',
                        'work_orders.tanggal_assembly1',
                        'work_orders.tanggal_assembly2',
                        'work_orders.tanggal_assembly3',
                        'work_orders.nama_item',
                        'work_orders.warna',
                        'work_orders.kode_unit',
                        'work_orders.fppp_id',
                        'fppps.fppp_no',
                        'fppps.project_name',
                        'assemblies.name'
                    ])
                    ->join('work_orders', 'rekap_subkons.work_order_id','=','work_orders.id')
                    ->join('assemblies', 'rekap_subkons.assembly_id','=','assemblies.id')
                    ->join('fppps', 'work_orders.fppp_id','=','fppps.id')
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->where('rekap_subkons.status_tagih',0)
                    ->when($this->col_selected,function($q){
                        $q->where($this->col_selected,"like","%". $this->search ."%");
                    })
                    ->when($this->assembly,function($query){
                        $query->where('rekap_subkons.kode_assembly',$this->assembly);
                    })
                    ->when($this->selectedJob,function($query){
                        $query->where('assemblies.name',$this->selectedJob);
                        });
        $items_view = $items -> paginate();
        $this->subkons = $items->get()->toArray();
        return view('rekapsubkon.index',[
            'title' => 'Tagihan Subcon',
            'ket' => 'Tabel ',
            'items' => $items_view,
            'icon' => 'groups',
            'job' => $job,
            'columns'=>$columns,
            'kode_assembly' => $kode_assembly,
            'tgl_assembly' => $this -> assembly,
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

    public function savedSubkon($subkonIndex)
    {
        // $this -> subkons = Resub::select(['jumlah_daun','keliling_kaca','harga_jasa'])->get()->toArray();
        $subkon = ['id'=>$this->subkons[$subkonIndex]['id'] ?? NULL,
                   'jumlah_daun'=>$this->subkons[$subkonIndex]['jumlah_daun'] ?? NULL,
                   'keliling_kaca'=>$this->subkons[$subkonIndex]['keliling_kaca'] ?? NULL,
                   'harga_jasa'=>$this->subkons[$subkonIndex]['harga_jasa'] ?? NULL,
                //    'total_biaya'=>($this->subkons[$subkonIndex]['jumlah_daun']) * ($this->subkons[$subkonIndex]['harga_jasa'])
                ];
        if ($subkon['keliling_kaca'] != NULL){
            $subkon['total_biaya'] = $subkon['keliling_kaca'] * $subkon['harga_jasa'];
        } else {
            $subkon['total_biaya']= $subkon['jumlah_daun'] * $subkon['harga_jasa'];
        };
        // dd($subkon);
        if (!is_null($subkon)){
             Resub::query()
                ->where('id',$subkon['id'])
                ->update($subkon);
        }
        $this->editedSubkonIndex = null;
    }
}
