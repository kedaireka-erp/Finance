<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Resub;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class ListApproved extends Component
{
    public $sortBy = 'rekap_subkons.created_at';
    public $sortDirection = 'desc';
    public $selectedJob =null;
    public $selectedStatus ='';
    public $checkedTagih =[];
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
        $job = ['Assembly','Las','Cek Opening','Pasang Kaca','Sealent Kaca'];
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
                    ->where('rekap_subkons.status_tagih',1)
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
        return view('listapproved.index',[
            'title' => 'Tagihan Subcon',
            'ket' => 'Tabel ',
            'items' => $items_view,
            'icon' => 'groups',
            'job' => $job,
            'columns'=>$columns,
            'kode_assembly' => $kode_assembly,
            'tgl_assembly' => $this -> assembly,
        ])->extends('layouts.main')->section('container');
    }
}
