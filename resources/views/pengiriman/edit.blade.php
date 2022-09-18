@extends('layouts.main')
@section('container')
    
{{-- <form action="{{ url('pengiriman/update/'.$id) }}" method="post"> --}}
<form action="{{ url('pengiriman/update/'.$id) }}" method="post">
    @csrf
    @foreach ($item as $i)
      <div class="container-fluid flex-grow-1">
        <h2 class="my-4 judul">Pengiriman</h3>
        <div class="card border-light mb-3">
          <div class="card-body">
            <div class="d-flex" style="color: #4891FF">
                <i class="material-icons-round bi p-2">account_balance</i>
                <span class="my-1 mx-2 fs-5" >Informasi Umum</span>
            </div>
            
              <div class="container">

                <div class="row m-4">

                  <div class = "col mb-3">
                    <div class="row px-3 py-2">
                      Tanggal
                    </div>
                    <div class="row px-3 py-2">
                      No Quotation
                    </div>
                    <div class="row px-3 py-2">
                      No FPPP
                    </div>
                    <div class="row px-3 py-2">
                      Aplikator
                    </div>
                    <div class="row px-3 py-2">
                      Nama Proyek
                    </div>
                    <div class="row px-3 py-2">
                      Kota
                    </div>
                  </div>

                 
                  <div class = "col">
                    
                    <div class="row py-2">
                        {{ $i->date_for_humans }}
                      </div>
                      <div class="row py-2">
                        {{ $i->quotation_no }}
                      </div>
                      <div class="row py-2">
                        {{ $i->fppp_no }}
                      </div>
                      <div class="row py-2">
                        {{ $i->applicator_name }}
                      </div>
                      <div class="row py-2">
                        {{ $i->project_name }}
                      </div>
                      <div class="row py-2">
                        {{ $i->tujuan }}
                      </div>
                    
                  </div>

                  <div class = "col">
                    <div class="row">
                      <div class="d-flex">
                        <div class="d-flex flex-column bg-ini p-1 text-center rounded mx-2">
                            <div class="px-4 py-3 bg-luar-ini text-white rounded ">Produk selesai</div>
                            <span class="datum p-4">{{ $i->qty_pack }}</span>
                        </div>
                        <div class="d-flex flex-column bg-ini p-1 text-center rounded mx-2">
                            <div class="px-4 py-3 bg-luar-ini text-white rounded ">Total Item</div>
                            <span class="datum p-4">100</span>
                        </div>
                      </div>
                      
                    </div>
                    

                    <div class="row my-3">
                      <span class="datum my-2">
                      Silahkan Pilih Status
                      </span>
                      <span class="fw-bold datum">
                        Status
                        </span>
                        <select class="form-select m-2 slect" aria-label="Default select example" name="status_select">
                            @foreach ($status as $status)
                            <option id="status" value='{{ $status }}' {{ $i -> acc_pengiriman == $status ? "selected":"" }} >{{ $status }}</option>
                            @endforeach
                          {{-- <option value=1>ACCEPT</option>
                          <option value=2>PENDING</option>
                          <option value=3>ACCEPT WITH NOTE</option> --}}
                        </select>
                    </div>

                  </div>
                  
                 

              </div>
                </div>
                

              </div>

              

        </div>
        <div class="card border-light mb-3">
          <div class="card-body">
            <div class="d-flex" style="color: #4891FF">
                <i class="material-icons-round bi p-2">event_note</i>
                <span class="my-1 mx-2 fs-5" >Catatan</span>
            </div>
            <div class="p-3">
              <textarea type="text" name="note" class="form-control" id="exampleFormControlInput1" rows="3" placeholder="Tuliskan note">{{ $i->note }}</textarea>
            </div>
          </div>
        </div>
       
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="/pengiriman" class="kembali-btn btn text-white btn-lg" style="width: 10rem">Kembali</a>        
                </div>
                <div>
                    @if ($i -> acc_pengiriman == 'ACCEPT')
                      <button id="btn-selesai" type="submit" class="aksi-btn btn btn-primary btn-lg disabled" style="width: 10rem">Selesai</button>  
                    @else
                      <button id="btn-selesai" type="submit" class="aksi-btn btn btn-primary btn-lg" style="width: 10rem">Selesai</button> 
                    @endif
                              
                </div>
            </div>
            
        </div>

      </div>
      @endforeach
</form>
  <x-pengiriman_script></x-pengiriman_script>
      @endsection  