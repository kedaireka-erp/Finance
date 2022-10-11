
<div class="container-fluid flex-grow-1">
  <h3 class="my-4 judul"> {{ $title }} </h3>
  <div class="card border-light mb-3">
    <div class="card-body">
      <h5 class="my-4 mx-2">
        <i class="material-icons-round bi me-2">{{ $icon }}</i>
        {{ $ket }}{{ $title }}
      </h5>

      <div class="row my-4 justify-content-between">
      <div class="row">
        
          <span class="my-2 mx-2 fs-7" style="color: #5C5858">
            Cari Berdasarkan
          </span>
          <div class="col-sm-2">
            <select wire:model="assembly" class="selection2 form-select mb-4" id="itemType" name="item_type" aria-label=".form-select-sm example">
              @foreach ($kode_assembly as $id => $assembly)
               <option value="{{ $id }}">{{ $assembly }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <div class="input-group mb-4" id="select-filter">
              <select wire:model="col_selected" class="selection form-select" id="itemType" name="item_type" aria-label=".form-select-sm example">
                <option value= "0">Choose Columns</option>
                @foreach ($columns as $columns_id => $columns_name)
                 <option value="{{ $columns_id }}">{{ $columns_name }}</option>
                @endforeach

              </select>
              <input wire:model="search" class="form-control" style="width: 10rem" id="exampleInputEmail1" aria-describedby="emailHelp" name="search" placeholder="search..">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="input-group mx-auto-sm mb-4" style="width: 10rem">
              <select class="selection form-select" wire:model="selectedJob" id="itemType" name="item_type" aria-label=".form-select-sm example">
                <option value= "0">ALL</option>
                @foreach ($job as $job)
                 <option value="{{ $job }}">{{ $job }}</option>
                @endforeach

              </select>
              </div>
        </div>
        <div class="col float-end">
            <div class="row">
              <div class="col">
                <button class="btn aksi-btn5  text-white  mx-2 float-end" wire:click="Unapprove()">Unapprove Tagihan ({{   count($checkedTagih)}})</button>
              </div>
              <div class="col-4">
                <a href="/rekap_subkon"  class="btn aksi-btn text-white float-end {{ Route::is('rekap_subkon') ? 'active' : ''}}">Add Item</a>
              </div>
            </div>
      </div>
      </div>



        </div>

<div class="table-responsive">
  <table class="table">
    {{-- table heading --}}
      <thead>
        <tr class="text-center">
          <th scope="col" ><input type="checkbox" wire:model="selectAll" ></th>
          <th scope="col" >
            <span>
              Tanggal Pengerjaan
              <i wire:click="sortBy('tanggal_assembly1')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'tanggal_assembly1' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
            </span>
          </th>
          <th  scope="col" >
            <span>
              Tanggal Tagih
              <i wire:click="sortBy('tgl_tagih')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'tgl_tagih' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
            </span>
          </th>
          <th  scope="col" >
              <span>
                Jenis Pekerjaan
                <i wire:click="sortBy('name')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'name' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
            </th>
          <th  scope="col" >
            <span>
              No FPPP
              <i wire:click="sortBy('fppp_no')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'fppp_no' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
            </span>
          </th>
          <th  scope="col">
            <span>
              Nama Projek
              <i wire:click="sortBy('project_name')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'project_name' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
            </span>
          </th>
          <th  scope="col">
              <span>
                Tipe Barang
                <i wire:click="sortBy('nama_item')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'nama_item' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
          <th  scope="col">
              <span>
                Warna
                <i wire:click="sortBy('warna')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'warna' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
          <th  scope="col">
              <span>
                Kode Unit
                <i wire:click="sortBy('kode_unit')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'kode_unit' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
          <th  scope="col">
              <span>
                Jumlah Daun
                <i wire:click="sortBy('jumlah_daun')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'jumlah_daun' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
          <th  scope="col">
            <span>
              Keliling Kaca
              <i wire:click="sortBy('keliling_kaca')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'keliling_kaca' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
            </span>
        </th>
          <th  scope="col">
              <span>
                Harga Jasa
                <i wire:click="sortBy('harga_jasa')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'harga_jasa' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
          <th  scope="col">
              <span>
                  Total Biaya
                <i wire:click="sortBy('total_biaya')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'total_biaya' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
        </tr>
      </thead>
      {{-- table body --}}
      <tbody>
        @foreach ($items as $d=>$item)
                <tr class="items-align-center">
                  <th scope="row">
                    <input class="form-check-input mt-0" type="checkbox" value="{{ $item->id}}" wire:model="checkedTagih">
                  </th>
                  <td>
                    @if ($tgl_assembly == 1)
                    {{ $item -> tanggal_assembly1 }}
                    @elseif ($tgl_assembly == 2)
                    {{ $item -> tanggal_assembly2 }}
                    @else
                    {{ $item -> tanggal_assembly3 }}
                    @endif
                  </td>
                  <td>{{ $item -> tgl_tagih }}</td>
                  <td>{{ $item -> name }}</td>
                  <td>{{ $item -> fppp_no }}</td>
                  <td>{{ $item -> project_name }}</td>
                  <td>{{ $item -> nama_item }}</td>
                  <td>{{ $item -> color }}</td>
                  <td>{{ $item -> kode_unit }}</td>
                  <td>{{ $item -> jumlah_daun }}</td>
                  <td>{{ $item -> keliling_kaca }}</td>
                  <td>{{ $item -> harga_jasa }}</td>
                  <td>{{ $item -> total_biaya }}</td>
                </tr>
        @endforeach
      </tbody>
    </table>

</div>
  {{-- pagination   --}}
  {{ $items -> links() }}

</div>
</div>
</div>


