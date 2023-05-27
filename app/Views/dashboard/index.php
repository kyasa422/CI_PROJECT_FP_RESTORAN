<?= $this->extend('layout/header_tailwind');  ?>

<?= $this->section('content');  ?>

<div class="grid md:grid-cols-12"> <!-- content wrapper -->
    <div class="md:col-span-2 md:flex md:justify-end "> <!-- start of nav-->
        <nav class="text-right ">
            <div class="flex justify-between items-center">
                <h1 class="font-bold uppercase p-4 border-b border-gray-100 text-mainFont">
                    <a href="/" class="text-sm md:text-lg hover:text-gray-700"> Purple Paradise Ice Cream</a>
                </h1>
                <div class="px-4 cursor-pointer md:hidden" id="menu-icon">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="menu w-6 h-6 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </div>
            </div>
            <ul class="hidden mt-6 text-sm md:block" id="menu">
                <li class="text-gray-700 font-bold py-2 ">
                    <a href="#" class="flex justify-center border-r-4 border-primary">
                        <span>Manajemen Eskrim</span>
                        
                    </a>
                </li>
                <li class="py-1 border-r-4 border-white">
                    <a href="/transaksi/history" class="flex justify-center">
                        <span>Manajemen Transaksi</span>
                        
                    </a>
                </li>
                <li class="py-1 border-r-4 border-white">
                <a href="login" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded flex justify-center"> Log Out</a>
              
            </ul>
        </nav>
    </div> <!-- end of nav-->

    <main class="px-16 py-6 bg-gray-100 md:col-span-10">

      



        <div class=" py-4"> <!-- Start of cards -->

            <p class="font-bold mt-12 pb-2 border-b border-gray-200">Manajemen Es-Cream</p>

            <a href="/product/create" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" ">Tambah Produk</a>
        </div>

           




        <div class=" border border-blue-500">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Nama EsCream</th>
                            <th scope="col" class="px-6 py-4">Harga</th>
                            <th scope="col" class="px-6 py-4">Foto EsCream</th>
                            <th scope="col" class="px-6 py-4">Deskripsi</th>
                            <th scope="col" class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        <?php if (count($products) > 0) : ?>
                            <?php foreach ($products as $product) : ?>
                                <tr class="border-b dark:border-neutral-500">
                                    <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium"><?= ++$no; ?></th>
                                    <td class="whitespace-nowrap px-6 py-4"><?= $product['name_eskrim']; ?></td>
                                    <td class="whitespace-nowrap px-6 py-4"><?= $product['harga']; ?></td>
                                    <td class="whitespace-nowrap px-6 py-4"><img src="<?= base_url('./img/uploads/' . $product['upload_foto']); ?>" alt="" width="100"></td>

                                    <td class="whitespace-nowrap pl-8 pr-6 py-4"><?= $product['deskripsi']; ?></td>

                                    <td class="flex">
                                        <form action="/product/delete/<?= $product['id']; ?>" method="post" id="deleteForm">
                                            <button type="submit" class="whitespace-nowrap px-3 py-16"> <img src="<?= base_url('./img/delete.png')?> " alt="" srcset=""> </button>
                                        </form>

                                        <a href="/product/edit/<?= $product['id']; ?>" class="whitespace-nowrap px-3 py-16"> <img src="<?= base_url('./img/edit.png')?> " alt="" srcset=""></a>
                                        <a href="/transaksi/detail/<?= $product['id']; ?>" class="whitespace-nowrap px-3 py-16"> <img src="<?= base_url('./img/receipt.png') ?> " alt="" srcset=""></a>
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






</main>
</div>

<?= $this->endSection();  ?>