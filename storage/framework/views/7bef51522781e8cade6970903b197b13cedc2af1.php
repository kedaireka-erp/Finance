<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Kedaireka</title>
</head>

<body>
  <h1>Table Barang</h1>
  <div>
    <a href="create" class="btn btn-primary">Tambah</a>
    <table class="table">
      <tr>
        <th>NO.</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>

      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($item->id); ?></td>
        <td><?php echo e($item->name); ?></td>
        <td><?php echo e($item->qty); ?></td>
        <td><?php echo e($item->price); ?></td>
        <td>
          <a href="<?php echo e(route("edit", $item->id)); ?>" class="btn btn-warning">Edit</a>
          <form action="<?php echo e(route("destroy", $item->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field("DELETE"); ?>
            <button type="submit" class="btn btn-danger">hapus</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html><?php /**PATH D:\application\kedaireka\resources\views/items/index.blade.php ENDPATH**/ ?>