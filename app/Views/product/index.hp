<?= $this->extend('layout/header_tailwind'); ?>

<?= $this->section('content'); ?>

<div >
  <h1>Daftar EsCream</h1>
  <div >
  

  </div>
  <div >
    <table >
      <thead >
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama EsCream</th>
          <th scope="col">Harga</th>
          <th scope="col">Foto EsCream</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0; ?>
        <?php if (count($products) > 0) : ?>
          <?php foreach ($products as $product) : ?>
            <tr>
              <th scope="row" ><?= ++$no; ?></th>
              <td><?= $product['name_eskrim']; ?></td>
              <td ><?= $product['harga']; ?></td>
              <td ><img src="img/uploads/<?= $product['upload_foto']; ?>" alt="" width="100"></td>

              <td ><?= $product['deskripsi']; ?></td>

              <td >
                <form action="/obat/delete/<?= $product['id']; ?>" method="post" id="deleteForm">
                  <button type="submit" ><i ></i></button>
                </form>
                <!-- <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-info-circle"></i></button> -->
                <a href="/obat/edit/<?= $product['id']; ?>" ><i class="bi bi-pencil-square"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="7">
              <h3>Maaf, produk belum tersedia</h3>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->


<script>
  $(function() {
    <?php if (session()->has("add")) : ?>
      Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '<?= session("add") ?>'
      })
    <?php endif; ?>

    <?php if (session()->has("delete")) : ?>
      Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '<?= session("delete") ?>'
      })
    <?php endif; ?>

    <?php if (session()->has("update")) : ?>
      Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '<?= session("update") ?>'
      })
    <?php endif; ?>

    $('.btn-delete').on('click', () => {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#deleteForm').submit();
        }
      })
    })
  });
</script>
<?= $this->endSection(); ?>