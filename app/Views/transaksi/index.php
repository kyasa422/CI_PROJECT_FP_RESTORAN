<?= $this->extend('layout/header'); ?>

<?= $this->section('content'); ?>
<div class="container form-wrapper">
    <div class="row ">
        <div class="col border border-1 mt-3">
            <?php $error = session()->get('_ci_validation_errors'); ?>
            <h4>RINCIAN PEMBELIAN</h4>
            <hr>
            <img src="/img/uploads/<?= $product['upload_foto']; ?>" alt="" >
            <hr>
            <h3 class="mb-2"><?= strtoupper($product['name_eskrim']); ?></h3>
            
            <p><i><?= $product['deskripsi']; ?></i></p>
            <br>


            <br>
            <h4>Rp<?= number_format($product['harga'], 0, ',', '.'); ?></h4>
            <br>
            <form action="/transaksi/save" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" id="id" value="<?= $product['id'] ?>">



                <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <input type="number" class="form-control <?= isset($error['jumlah']) ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>" placeholder="Jumlah barang" autocomplete="off">
                        <div class="invalid-feedback">
                            <?= isset($error['jumlah']) ? $error['jumlah'] : ''; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pembeli" class="col-sm-2 col-form-label">Nama Pembeli</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($error['pembeli']) ? 'is-invalid' : '' ?>" id="pembeli" name="pembeli" value="<?= old('pembeli'); ?>" placeholder="Nama pembeli barang" autofocus autocomplete="off">
                        <div class="invalid-feedback">
                            <?= isset($error['pembeli']) ? $error['pembeli'] : ''; ?>
                        </div>
                    </div>
                </div>

          
                <a href="/dashboard/" class="btn btn-danger mr-3">Kembali</a>
                <button type="submit" class="btn btn-success">Beli</button>
                <br><br><br>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>




