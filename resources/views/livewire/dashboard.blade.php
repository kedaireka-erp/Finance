@extends('layouts/main')

@section('container')

<div class="container-fluid flex-grow-1">
  <h3 class="my-4 judul"> {{ $title }} </h3>
  <div class="card border-light mb-3 p-5">
    <h4 class="text-dark">Selamat Datang, Sulistyo A ! </h4>
    <p class="text-muted">Selamat datang di sistem finance.</p>
    <div class="rounded-2 nt p-3 row">
      <div class="col d-flex text-start mt-2">
        <i class="material-icons-round bi me-4" style="color:#4891FF">info</i>
        <span class="info">Terdapat 3 status pending pada produksi yang perlu diselesaikan.</span>
      </div>
      <h6 class="col-1 text-end mt-2" style="cursor: pointer">Abaikan</h6>
    </div>
    <div class="row rounded-2 nt p-3 mt-2">
      <div class="col d-flex text-start mt-2">
        <i class="material-icons-round bi me-4" style="color:#4891FF">info</i>
        <span class="info">Terdapat 1 status pending pada pengiriman yang perlu diselesaikan.</span>
      </div>
      <h6 class="col-1 text-end mt-2 " style="cursor: pointer">Abaikan</h6>
    </div>
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
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">6</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-green text-decoration-none rounded-2">
          <p class=" x-5 my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">expand_circle_down</i>Accept</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">3</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-red text-decoration-none rounded-2">
          <p class="my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">history</i>Pending</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">3</p>
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
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">6</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-green text-decoration-none rounded-2">
          <p class="mx-5 my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">expand_circle_down</i>Accept</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">4</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
    <div class="card border-light">
      <div class="inner">
        <div class="mb-4 mx-2 card-orange text-decoration-none rounded-2">
          <p class=" my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">fact_check</i>Accept With Note</p>
        </div>
        <p class="datum fs-4 fw-bolder p-4 my-4 text-center">1</p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 mb-2">
      <div class="card border-light">
        <div class="inner">
          <div class="mb-4 mx-2 card-red text-decoration-none rounded-2">
            <p class="mx-5 my-2 p-2 text-white text-center"><i class="col material-icons-round bi me-4">history</i>Pending</p>
          </div>
          <p class="datum fs-4 fw-bolder p-4 my-4 text-center">1</p>
        </div>
      </div>
  </div>
</div>

  
</div>
</div>

@endsection