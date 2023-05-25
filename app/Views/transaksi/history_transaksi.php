<?= $this->extend('layout/header_tailwind');  ?>

<?= $this->section('content');  ?>

<div class="border border-blue-500">
    <table class="min-w-full text-left text-sm font-light">
        <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-6 py-4">#</th>
                <th scope="col" class="px-6 py-4">harga</th>
                <th scope="col" class="px-6 py-4">jumlah </th>
                <th scope="col" class="px-6 py-4">pembeli</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            <?php if (count($products) > 0) : ?>
                <?php foreach ($products as $product) : ?>
                    <tr class="border-b dark:border-neutral-500">
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium"><?= ++$no; ?></th>
                        <td class="whitespace-nowrap px-6 py-4"><?= $product['jumlah']; ?></td>

                        <td class="whitespace-nowrap px-6 py-4"><?= $product['harga']; ?></td>


                        <td class="whitespace-nowrap pl-8 pr-6 py-4"><?= $product['buyer']; ?></td>


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

<?= $this->endSection();  ?>