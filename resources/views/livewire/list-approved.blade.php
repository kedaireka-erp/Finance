
<div class="container-fluid flex-grow-1">
  <h3 class="my-4 judul"> {{ $title }} </h3>
  <div class="card border-light mb-3">
    <div class="card-body">
      <h5 class="my-4 mx-2">
        <i class="material-icons-round bi me-2">{{ $icon }}</i>
        {{ $ket }}{{ $title }}
      </h5> 

      <div class="row my-4 justify-content-between">
        <span class="my-2 mx-2 fs-7" style="color: #5C5858">
          Cari Berdasarkan
        </span>
        <div class="col">
              <div class="input-group mx-2 mb-4" id="select-filter">
                <select class="selection form-select" id="itemType" name="item_type" aria-label=".form-select-sm example">
                  <option value= "0">Choose Columns</option>
                  @foreach ($columns as $columns_id => $columns_name)
                   <option value="{{ $columns_id }}">{{ $columns_name }}</option>
                  @endforeach

                </select>
                <input class="form-control" style="width:10rem" id="exampleInputEmail1" aria-describedby="emailHelp" name="search" placeholder="search..">
              </div>
        </div>
        <div class="col float-end">
            <a href="/rekap_subkon"  class="btn aksi-btn text-white mx-2 float-end {{ Route::is('rekap_subkon') ? 'active' : ''}}">Add Item</a>
        </div>

        </div>

<div class="table-responsive">
  <table class="table">
    {{-- table heading --}}
      <thead>
        <tr class="text-center">
          <th scope="col" >
            <span>
              Tanggal Pengerjaan
              <i wire:click="sortBy('tgl_terima_fppp')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'tgl_terima_fppp' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
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
                <i wire:click="sortBy('')" style="cursor: pointer" class="material-icons-round {{ $sortBy === '' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
            </th>
          <th  scope="col" >
            <span>
              No FPPP
              <i wire:click="sortBy('')" style="cursor: pointer" class="material-icons-round {{ $sortBy === '' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
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
                <i wire:click="sortBy('tipe_barang')" style="cursor: pointer" class="material-icons-round {{ $sortBy === 'tipe_barang' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
          <th  scope="col">
              <span>
                Warna
                <i wire:click="sortBy('')" style="cursor: pointer" class="material-icons-round {{ $sortBy === '' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
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
                <i wire:click="sortBy('')" style="cursor: pointer" class="material-icons-round {{ $sortBy === '' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
          <th  scope="col">
              <span>
                Harga Jasa
                <i wire:click="sortBy('')" style="cursor: pointer" class="material-icons-round {{ $sortBy === '' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
          <th  scope="col">
              <span>
                  Total Biaya
                <i wire:click="sortBy('')" style="cursor: pointer" class="material-icons-round {{ $sortBy === '' && $sortDirection === 'desc' ? '' : 'no-use' }}">arrow_drop_down</i>
              </span>
          </th>
        </tr>
      </thead>
      {{-- table body --}}
      <tbody>
        @foreach ($items as $d=>$item)
                <tr class="items-align-center">
                  <td>{{ $item -> tgl_terima_fppp }}</td>
                  <td>{{ $item -> tgl_tagih }}</td>
                  <td>jenis pekerjaan</td>
                  <td>{{ $item -> fppps -> fppp_no }}</td>
                  <td>{{ $item -> fppps -> project_name }}</td>
                  <td>{{ $item -> tipe_barang }}</td>
                  <td>warna</td>
                  <td>{{ $item -> kode_unit }}</td>
                  <td>{{ $item -> jumlah_daun }}</td>
                  <td>{{ $item -> harga_jasa }}</td>
                  <td>{{ $item -> jumlah_daun * $item -> harga_jasa }}</td>
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


