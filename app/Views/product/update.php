<?= $this->extend('layout/header'); ?>

<?= $this->section('content'); ?>
<div class="row ms-2">
  <h1 class="my-3">Form Edit Produk</h1>
  <div class="col-lg-8 border border-2 rounded-3 p-3 shadow">
    <?php $error = session()->get('_ci_validation_errors'); ?>



    <form action="/product/update" method="post" enctype="multipart/form-data" class="d-flex flex-column">
      <input type="hidden" name="id_product" value="<?= $product['id']; ?>">
      <div class="mb-3">
        <label for="name_eskrim" class="form-label">Nama EsCream</label>
        <textarea class="form-control <?= isset($error['name_eskrim']) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="2" placeholder="FDR Ring 14, 2023" name="name_eskrim"><?= $product['name_eskrim']; ?></textarea>
        <div class="invalid-feedback">
          <?= isset($error['name_eskrim']) ? $error['name_eskrim'] : ''; ?>
        </div>
      </div>



      <div class="mb-3">
        <label for="harga_per_satuan" class="form-label">Harga </label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Rp.</span>
          <input type="number" class="form-control  <?= isset($error['harga']) ? 'is-invalid' : ''; ?>" id="harga" name="harga" placeholder="0" value="<?= $product['harga']; ?>">
          <div class="invalid-feedback">
            <?= isset($error['harga']) ? $error['harga'] : ''; ?>
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="upload_foto" class="form-label">Foto Barang</label>
        <img src="/img/uploads/<?= $product['upload_foto']; ?>" alt="" class="img-preview d-block my-3" width="100">
        <input type="file" class="form-control  <?= isset($error['upload_foto']) ? 'is-invalid' : ''; ?>" name="upload_foto" id="upload_foto">
        <div class="invalid-feedback">
          <?= isset($error['upload_foto']) ? $error['upload_foto'] : ''; ?>
        </div>
      </div>

      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control <?= isset($error['deskripsi']) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi" name="deskripsi"><?= $product['deskripsi']; ?></textarea>
        <div class="invalid-feedback">
          <?= isset($error['deskripsi']) ? $error['deskripsi'] : ''; ?>
        </div>
      </div>

      <div class="button align-self-end">
        <a href="/product" type="submit" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Image Preview
  const img_preview = document.querySelector(".img-preview");
  const input_img = document.getElementById("foto_barang");
  input_img.addEventListener("change", function(e) {
    img_preview.src = URL.createObjectURL(this.files[0]);
    img_preview.classList.remove("d-none");
  });
</script>
<?= $this->endSection(); ?>