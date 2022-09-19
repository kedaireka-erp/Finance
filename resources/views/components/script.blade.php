 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $("#burger-menu").click(function(){
    $(".s").toggleClass("close",[3]);
  });

  
 
</script>

{{-- sweetalert --}}
<script>
  window.addEventListener('show-status-confirmation', event =>{
    Swal.fire({
      title: 'Are you sure?',
      text: ('The status will be changed into ACCEPT'),
      text: "The status will be changed into ACCEPT",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#4891FF',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('statusChanged')
        }
    })
  })
  
  window.addEventListener('show-status-confirmation1', event =>{
    Swal.fire({
      title: 'Are you sure?',
      text: ('The status will be changed into PENDING'),
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#4891FF',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('statusUndo')
        }
    }) 
  })

</script>

@livewireScripts

</body>
</html>