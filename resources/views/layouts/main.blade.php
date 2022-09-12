


  <div class="d-flex">
    
    <x-sidebar></x-sidebar>

    <div class="d-flex flex-column container-fluid" style="min-height: 100vh;background-color: #E6EBF5;">
      <x-navbar></x-navbar>

      
            {{-- isi content --}}
            @yield('container')
          
      
      <x-footer></x-footer>
    </div>  
</div>


