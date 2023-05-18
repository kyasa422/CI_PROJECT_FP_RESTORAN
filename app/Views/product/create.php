<?= $this->extend('layout/header'); ?>

<?= $this->section('content'); ?>
<div class="row ms-2">
  <h1 class="my-3">Form Tambah Produk</h1>
  <div class="col-lg-8 border border-2 rounded-3 p-3 shadow">
    <?php $error = session()->get('_ci_validation_errors'); ?>
    <form action="/product/store" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nama_escream" class="form-label">Nama EsCream</label>
        <textarea class="form-control <?= isset($error['name_eskrim']) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="2" placeholder="Nama eskrim" name="name_eskrim"><?= old('name_eskrim'); ?></textarea>
        <div class="invalid-feedback">
          <?= isset($error['name_eskrim']) ? $error['name_eskrim'] : ''; ?>
        </div>
      </div>

      <div class="mb-3 col-2">
        <label for="kuantitas" class="form-label">Harga</label>
        <div class="input-group">
          <input type="number" class="form-control  <?= isset($error['harga']) ? 'is-invalid' : ''; ?>" id="kuantitas" name="harga" placeholder="0" value="<?= old('harga'); ?>">
          <div class="invalid-feedback">
            <?= isset($error['harga']) ? $error['harga'] : ''; ?>

          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="foto_barang" class="form-label">Foto Eskrim</label>
        <img src="<?= old('upload_foto'); ?>" alt="" class="img-preview d-block my-3 d-none" width="100">
        <input type="file" class="form-control  <?= isset($error['upload_foto']) ? 'is-invalid' : ''; ?>" name="upload_foto" id="upload_foto">
        <div class="invalid-feedback">
          <?= isset($error['upload_foto']) ? $error['upload_foto'] : ''; ?>
        </div>
      </div>

      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control <?= isset($error['deskripsi']) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi" name="deskripsi"><?= old('deskripsi'); ?></textarea>
        <div class="invalid-feedback">
          <?= isset($error['deskripsi']) ? $error['deskripsi'] : ''; ?>
        </div>

      <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
  </div>
</div>

<script>
  // Image Preview
  const img_preview = document.querySelector(".img-preview");
  const input_img = document.getElementById("upload_foto");
  input_img.addEventListener("change", function(e) {
    img_preview.src = URL.createObjectURL(this.files[0]);
    img_preview.classList.remove("d-none");
  });
</script>
<?= $this->endSection(); ?>