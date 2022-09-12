@extends('layouts/main')

@section('container')

<div class="container-fluid flex-grow-1">
  <h3 class="my-4 judul"> {{ $title }} </h3>
  <div class="card border-light mb-3">
    <div class="card-body table-responsive">
      <h5 class="my-4 mx-2"> 
        <i class="material-icons-round bi me-2">{{ $icon }}</i>
        {{ $ket }}{{ $title }} 
      </h5>

      <div class="row my-4">
        <span class="my-2 mx-2 fs-7" style="color: #5C5858"> 
          Cari Berdasarkan
        </span>
        <div class="col-5">
              <div class="input-group mx-2 mb-4">
                <select class="selection form-select" id="itemType" name="item_type" aria-label=".form-select-sm example">
                  <option value= "0">Choose Columns</option>
                  @foreach ($columns as $columns_id => $columns_name)
                   <option value="{{ $columns_id }}">{{ $columns_name }}</option>
                  @endforeach
                  
                </select>
                <input class="form-control" style="width:10rem" id="exampleInputEmail1" aria-describedby="emailHelp" name="search" placeholder="search..">
              </div>
        </div>
      </div>

<table class="table">
  {{-- table heading --}}
    <thead>
      <tr class="text-center">
        <th scope="col">No</th>
        <th scope="col" >
          <span>
            Tanggal
            <i wire:click="sortBy('created_at')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'created_at' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
          </span> 
        </th> 
        <th  scope="col" >
          <span>
            No Quotation
            <i wire:click="sortBy('quotation_no')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'quotation_no' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
          </span> 
        </th>               
        <th  scope="col" >
          <span>
            No FPPP
            <i wire:click="sortBy('fppp_no')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'fppp_no' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
          </span> 
        </th>
        <th  scope="col" >
          <span>
            Aplikator
            <i wire:click="sortBy('applicator_name')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'applicator_name' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
          </span>
        </th>
        <th  scope="col">
          <span>
            Nama Projek
            <i wire:click="sortBy('project_name')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'project_name' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
          </span>
        </th>
        <th scope="col">Status</th>
      </tr>
    
      {{-- Search filter --}}
      {{-- <tr class="align-center">
        <td></td>
        <td>
           <input type="text" class="form-control" wire:model="searchColumnsKode" style="width : 10rem"/>
        </td>
        <td>
          <input type="text" class="form-control" wire:model="searchColumnsNama" style="width : 10rem"/>
       </td>
        <td>
          <div class="d-flex flex-column">
            <label>From</label>
            <input type="number" class="form-control d-inline mb-2" style="width: 75px"
              wire:model="searchColumnsStockMin" />
            <label>to</label>
            <input type="number" class="form-control d-inline" style="width: 75px"
             wire:model="searchColumnsStockMax" />
          </div>
        </td>
        <td>
          <div class="d-flex flex-column">
            <label>From</label>
            <input type="number" class="form-control d-inline mb-2" style="width: 75px"
              wire:model="searchColumnsPriceMin" />
            <label>to</label>
            <input type="number" class="form-control d-inline" style="width: 75px"
             wire:model="searchColumnsPriceMax" />
          </div>
       </td>
       <td>
        <div class="d-flex flex-column">
          <label>From</label>
          <input type="number" class="form-control d-inline mb-2" style="width: 75px"
            wire:model="searchColumnsTotalMin" />
          <label>to</label>
          <input type="number" class="form-control d-inline" style="width: 75px"
           wire:model="searchColumnsTotalMax" />
        </div>
     </td>
     <td>
      <div class="d-flex flex-column">
        <label>From</label>
        <input type="date" class="form-date form-control d-inline mb-2"  
          wire:model="searchColumnsDateMin" />
        <label>to</label>
        <input type="date" class="form-date form-control d-inline" 
         wire:model="searchColumnsDateMax" />
      </div>
   </td>
        <td>
           <select class="selection form-control" wire:model="searchColumnsStatusId">
              <option value="">choose status</option>
               @foreach ($status as $status_id => $status_name)
                   <option value="{{ $status_id }}">{{ $status_name }}</option>
               @endforeach
           </select>
        </td>
     </tr> --}}
    </thead>
    {{-- table body --}}
    <tbody>
      @foreach ($items as $d=>$item)
              <tr class="items-align-center">
                <th scope="row">{{ $items->firstItem() + $d}}</th>
                <td>{{ $item -> date_for_humans }}</td>
                <td>{{ $item -> quotation_no }}</td>
                <td>{{ $item -> fppp_no }}</td>
                <td>{{ $item -> applicator_name }}</td>
                <td>{{ $item -> project_name }}</td>
                <td class="p-4 text-center">
                  <button class="status  p-2 btn btn-outline-light" style="background-color: {{ $item -> status_color }}; color:{{ $item-> status_text_color }}">{{ $item -> acc_produksi }}</button>
                </td>
              </tr>
      @endforeach
    </tbody>
  </table> 
  {{-- pagination   --}}
  {{ $items -> links() }}

</div>
</div>
</div>
@endsection

