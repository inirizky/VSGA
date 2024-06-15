<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disini Cuy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
</head>

<body>

    <?php include "layout/header.html" ?>

    <div class="flex p-6 bg-gray-200 items-center justify-between flex-col md:flex-row gap-4">
        <div class="w-full flex flex-col">
            <h2 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-700 md:text-5xl lg:text-3xl">
                Waktunya liburan?</h2>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl ">Cari dan booking tempat wisata mudah hanya
                DISINI CUY.</p>
            <a href="/VSGA/pesan.php"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br w-1/2 font-medium rounded-lg text-sm px-4 py-2.5 text-center">Pesan
                Sekarang</a>
        </div>
        <div id="default-carousel" class="relative w-full rounded-md overflow-hidden" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-72 overflow-hidden md:h-72">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1653832920019-db280240dd41?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1504929065893-ec054770319e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1514653596980-c93c82c60413?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1717562192681-2a12beb652ac?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1718086436850-ac77db40dadb?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    <main class="p-6 flex flex-col justify-between md:flex-row gap-2">
        <div class="flex gap-6 w-full h-fit flex-wrap">
            <div
                class="md:basis-[48%] bg-white border border-gray-200 rounded-lg  shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg"
                    src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/d6/a1/76/pemandangan-pulau2-kecil.jpg?w=1200&h=1200&s=1"
                    alt="" />
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Raja Ampat</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nikmati liburan dengan snorkeling,
                        diving, dan menjelajahi keindahan alam yang luar biasa di Raja Ampat.</p>
                </div>
            </div>
            <div
                class="md:basis-[48%] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg"
                    src="https://media.theindonesia.id/thumbs/2022/01/25/28526-komodo-island/653x366-img-28526-komodo-island.jpg"
                    alt="" />
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pulau Komodo</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dari komodo yang menakjubkan hingga
                        panorama laut yang memukau, Pulau Komodo menawarkan pengalaman yang tak terlupakan.</p>
                </div>
            </div>
            <div
                class="md:basis-[48%] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg"
                    src="https://backpanel.kemlu.go.id/PublishingImages/Pasir-merah-muda-merupakan-fenomena-langka-yang-ada-tujuh-lokasi-di-dunia-dan-Pantai-Pink-Lombok-Timur-NTB-menjadi-salah-satunya-erlin-dhita-640x427%20GoogleMaps-erlin%20dhita.jpg"
                    alt="" />
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Labuan Bajo</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Kunjungi pulau-pulau eksotis, jelajahi kekayaan bawah laut, dan nikmati panorama alam yang
                        menakjubkan.
                    </p>

                </div>
            </div>

        </div>


        <div class="flex flex-col gap-4 md:w-1/2 h-full">
    <?php
    // Baca file JSON
    $jsonData = file_get_contents('assets/video.json');

    // Ubah JSON menjadi array PHP
    $data = json_decode($jsonData, true);

    // Periksa jika ada data yang berhasil dibaca
    if ($data !== null) {
        // Iterasi setiap item dalam data
        foreach ($data as $item) {
            // Ambil nilai title dan videoUrl
            $title = $item['title'];
            $videoUrl = $item['videoUrl'];
    ?>
                <div class="flex flex-col bg-blue-700 text-zinc-50">
                    <h4 class="p-2 text-center">
                        <?php echo $title; ?>
                    </h4>
                    <div class="w-full h-auto max-w-full border border-gray-200 rounded-lg dark:border-gray-700">
                        <iframe class="rounded-lg w-full h-72" src="<?php echo $videoUrl; ?>" allowfullscreen></iframe>
                    </div>
                </div>

    <?php
        }
        // FOR EACH BERAKHIR
        } else {
            echo "Gagal membaca atau parsing file JSON.";
        }
     ?>


        </div>
    </main>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <!-- <script src="js/bootstrap.js"></script> -->
</body>

</html>


<!-- <?php

        // $nama = 'Rizky Imut';

        // echo $nama;

        ?> -->