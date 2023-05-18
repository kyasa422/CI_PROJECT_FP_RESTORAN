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
                    <a href="#" class="flex justify-end border-r-4 border-primary">
                        <span>Manajemen Eskrim</span>
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="home w-5 h-5 ml-2 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </a>
                </li>
                <li class="py-1 border-r-4 border-white">
                    <a href="#" class="flex justify-end">
                        <span>Manajemen Transaksi</span>
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="light-bulb w-5 h-6 ml-2 ">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </a>
                </li>
                <li class="py-1 border-r-4 border-white">
                    <a href="#" class="flex justify-end">
                        <span>Contact</span>
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mail w-5 h-6 ml-2 ">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div> <!-- end of nav-->

    <main class="px-16 py-6 bg-gray-100 md:col-span-10">

        <div class="flex justify-center md:justify-end">
            <a href="#" class="btn text-black md:border-2 border-blue-500 md:rounded-full hover:bg-primary hover:text-white p-2"> Log Out</a>
        </div>



        <div> <!-- Start of cards -->

            <p class="font-bold mt-12 pb-2 border-b border-gray-200">Manajemen Es-Cream</p>
            <a href="product/create" class="bg-blue-500   ">Tambah Produk</a>
        </div>


        <div class="border border-blue-500">
            <table class="border border-blue-500 px-10">

                <tr>
                    <th>#</th>
                    <th class=" grid ">Nama EsCream</th>
                    <th>Harga</th>
                    <th>Foto EsCream</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>

                <tbody>
                    <?php $no = 0; ?>
                    <?php if (count($products) > 0) : ?>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <th scope="row"><?= ++$no; ?></th>
                                <td><?= $product['name_eskrim']; ?></td>
                                <td><?= $product['harga']; ?></td>
                                <td><img src="img/uploads/<?= $product['upload_foto']; ?>" alt="" width="100"></td>

                                <td><?= $product['deskripsi']; ?></td>

                                <td>
                                    <form action="/product/delete/<?= $product['id']; ?>" method="post" id="deleteForm">
                                        <button type="submit"> D </button>
                                    </form>
                                    <!-- <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-info-circle"></i></button> -->
                                    <a href="/obat/edit/<?= $product['id']; ?>"> E</a>
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





</div> <!-- most popular Card section end -->

<div class="flex justify-center">
    <button class="bg-secondary-100 text-secondary-200 btn transform  hover:scale-125 hover: bg-opacity-50 hover:shadow-inner"> load more</button>
</div>

</div> <!-- end of cards -->
</main>
</div>

<?= $this->endSection();  ?>