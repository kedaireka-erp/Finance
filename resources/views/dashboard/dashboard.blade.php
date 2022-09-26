
<div class="container-fluid flex-grow-1">
  <h3 class="my-4 judul"> {{ $title }} </h3>
  <div class="card border-light mb-3 p-5">
    <h4 class="text-dark">Selamat Datang, Sulistyo A ! </h4>
    <p class="text-muted">Selamat datang di sistem finance.</p>
    @if(count($pending_produksi) != 0)
    <div class="rounded-2 nt p-3 row" id="offProduksi">
      <div class="col d-flex text-start mt-2">
        <i class="material-icons-round bi me-4" style="color:#4891FF">info</i>
        <span class="info">Terdapat {{ count($pending_produksi) }} status pending pada produksi yang perlu diselesaikan.</span>
      </div>
      <h6 class="col text-end mt-2" style="cursor: pointer" type="button" onclick="produksi()">Abaikan</h6>
    </div>
    @endif
    @if(count($pending_pengiriman) != 0)
    <div class="row rounded-2 nt p-3 mt-2" id="offPengiriman">
      <div class="col d-flex text-start mt-2">
        <i class="material-icons-round bi me-4" style="color:#4891FF">info</i>
        <span class="info">Terdapat {{ count($pending_pengiriman) }}  status pending pada pengiriman yang perlu diselesaikan.</span>
      </div>
      <h6 class="col text-end mt-2 " style="cursor: pointer" type="button" onclick="pengiriman()">Abaikan</h6>
    </div>
    @endif
  </div>
  
<div class="container-fluid">
<div class="row mt-4">
  <h5 class="text-blue mb-3">Produksi</h5>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-blue text-decoration-none rounded-2">
          <p class="col mx-5 my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">storage</i>Jumlah Data</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">{{count($produksi)}}</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-green text-decoration-none rounded-2">
          <p class=" x-5 my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">expand_circle_down</i>Accept</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">{{count($acc_produksi)}}</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-red text-decoration-none rounded-2">
          <p class="my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">history</i>Pending</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">{{count($pending_produksi)}}</p>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4 ">
  <h5 class="text-blue mb-3">Pengiriman</h5>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-blue text-decoration-none rounded-2">
          <p class="mx-5 my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">storage</i>Jumlah Data</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">{{count($pengiriman)}}</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-green text-decoration-none rounded-2">
          <p class="mx-5 my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">expand_circle_down</i>Accept</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">{{count($acc_pengiriman)}}</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-orange text-decoration-none rounded-2">
          <p class=" my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">fact_check</i>Accept With Note</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">{{count($acc_withnote)}}</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
      <div class="card border-light">
        <div class="inner">
          <div class="mb-4 mx-2 card-red text-decoration-none rounded-2">
            <p class="mx-5 my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">history</i>Pending</p>
          </div>
          <p class="datum fs-4 fw-bolder p-4 my-4 text-center">{{count($pending_pengiriman)}}</p>
        </div>
      </div>
  </div>
</div>

  
</div>
</div>
<script>
    function pengiriman() {
        var v = document.getElementById("offPengiriman");
        if (v.style.display === "none") {
            v.style.display = "block";
        } else {
            v.style.display = "none";
        }
    }

    function produksi() {
        var v = document.getElementById("offProduksi");
        if (v.style.display === "none") {
            v.style.display = "block";
        } else {
            v.style.display = "none";
        }
    }
</script>
