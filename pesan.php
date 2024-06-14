<?php
include "service/db.php";

  if (isset($_POST["pesan"])) {
    $nama = $_POST["nama"];
    $nohp = $_POST["nohp"];
    $tanggal_pemesanan = $_POST["tanggal-pemesanan"];
    $durasi_pemesanan = $_POST["durasi-pemesanan"];
    $jumlah_pemesan = $_POST["jumlah-pemesan"];
    $penginapan = isset($_POST['penginapan']) ? 1 : 0;
    $transportasi = isset($_POST['transportasi']) ? 1 : 0;
    $makanan = isset($_POST['makanan']) ? 1 : 0;
    $harga_paket = $_POST["harga-paket"];
    $jumlah_tagihan = $_POST["jumlah-tagihan"];

    $hasil = $durasi_pemesanan * $jumlah_pemesan * $harga_paket;

  
    $sql = "INSERT INTO tb_tiket (name, phone_number, booking_date, duration, number_of_people, isHotel, isTransport, isCatering, packet_price, total_price) 
              VALUES ('$nama', '$nohp', '$tanggal_pemesanan', '$durasi_pemesanan', '$jumlah_pemesan', '$penginapan', '$transportasi', '$makanan', '$harga_paket', '$hasil')";
  

    if ($db->query($sql)) {
      header('Location: daftar-pesanan.php');
    } else {
      echo "Data Gagal";
    }
  } 



if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM tb_tiket WHERE id = $id";
  $result = $db->query($sql);
  $data = $result->fetch_assoc();
} else {
  // echo "ID tidak ditemukan.";
};
?>


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


  <main class="p-6 flex flex-col md:flex-row justify-between gap-2">
  <form class="w-full max-w-2xl mx-auto" id="booking-form" action="pesan.php" method="POST">
      <div class="flex gap-4">
        <div class="mb-5 w-full">
          <label for="nama" class="block mb-2 w-full text-sm font-medium text-gray-900">Nama Pemesan</label>
          <input type="text" name="nama" value="<?= isset($data['name']) ? $data['name'] : '' ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        <div class="mb-5 w-full">
          <label for="nohp" class="block mb-2 w-full text-sm font-medium text-gray-900">No HP / Telp</label>
          <input type="number" name="nohp" value="<?= isset($data['phone_number']) ? $data['phone_number'] : '' ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
        </div>
      </div>
      <div class="flex gap-4">
        <div class="mb-5 w-full">
          <label for="tanggal-pemesanan" class="block mb-2 w-full text-sm font-medium text-gray-900">Tanggal
            Pemesanan</label>
          <input type="date" name="tanggal-pemesanan" value="<?= isset($data['booking_date']) ? $data['booking_date'] : '' ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
        </div>
        <div class="mb-5 w-full">
          <label for="durasi-pemesanan" class="block mb-2 text-sm font-medium text-gray-900 ">Durasi Pemesanan</label>
          <div class="flex">
            <input type="text" id="durasi-pemesanan" name="durasi-pemesanan" value="<?= isset($data['duration']) ? $data['duration'] : '' ?>" class=" rounded-l-lg bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <span class="inline-flex  items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-r-lg border-gray-300 ">
              hari
            </span>
          </div>
        </div>
      </div>


      <div class="mb-5">
        <label for="jumlah-pemesan" class="block mb-2 text-sm font-medium text-gray-900 ">Jumlah Pemesan</label>
        <div class="flex">
          <input type="text" id="jumlah-pemesan" name="jumlah-pemesan" value="<?= isset($data['number_of_people']) ? $data['number_of_people'] : '' ?>" class=" rounded-l-lg bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          <span class="inline-flex  items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-r-lg border-gray-300 ">
            orang
          </span>
        </div>
      </div>
      <div class="mb-5">
        <label class="block mb-2 w-full text-sm font-medium text-gray-900">Layanan Paket Perjalanan</label>
        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:border-gray-600">
          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center ps-3">
              <input id="penginapan" name="penginapan" type="checkbox" value="1000000" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"   <?= isset($data['isHotel']) && $data['isHotel'] ? 'checked' : '' ?> onchange="hitungPaket()">
              <label for="penginapan" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Penginapan
                (Rp1.000.000)</label>
            </div>
          </li>
          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center ps-3">
              <input id="transportasi" name="transportasi" type="checkbox" value="1200000" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" <?= isset($data['isHotel']) && $data['isHotel'] ? 'checked' : '' ?> onchange="hitungPaket()">
              <label for="transportasi" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Transportasi
                (Rp1.200.000)</label>
            </div>
          </li>
          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center ps-3">
              <input id="makanan" name="makanan" type="checkbox" value="500000" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" <?= isset($data['isHotel']) && $data['isHotel'] ? 'checked' : '' ?> onchange="hitungPaket()">
              <label for="makanan" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Makanan
                (Rp500.000)</label>
            </div>
          </li>
        </ul>
      </div>

      <div class="mb-5">
        <label for="harga-paket" class="block mb-2 text-sm font-medium text-gray-900">Harga Paket</label>
        <div class="flex">
          <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-l-lg border-gray-300">
            Rp
          </span>
          <input type="text" name="harga-paket" id="harga-paket" value="<?= isset($data['packet_price']) ? $data['packet_price'] : '' ?>" class="rounded-r-lg bg-gray-200 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
      </div>
      <div class="mb-5">
        <label for="jumlah-tagihan" class="block mb-2 text-sm font-medium text-gray-900 ">Jumlah Tagihan</label>
        <div class="flex">
          <span class="inline-flex  items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-l-lg border-gray-300 ">
            Rp
          </span>
          <input type="text" name="jumlah-tagihan" id="jumlah-tagihan" value="<?= isset($data['packet_price']) ? $data['packet_price'] : '' ?>" class=" rounded-r-lg bg-gray-200 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
      </div>
      <div class="flex items-start mb-5 gap-2">
        <!-- <button type="submit" name="pesan" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:focus:ring-red-800">Pesan</button> -->
        <!-- <button type="submit" name="reset" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:focus:ring-blue-800">Reset</button> -->
        <button type="submit" name="pesan" id="btn-pesan" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:focus:ring-blue-800">Pesan</button>
    </form>

      <!-- Modal -->
      <div id="error-modal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-50">
            <div class="bg-white rounded-lg shadow p-6 w-1/3">
                <h2 class="text-xl font-semibold mb-4">Error</h2>
                <p class="mb-4">Harap isi semua field yang diperlukan.</p>
                <button id="close-modal" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">Tutup</button>
            </div>
        </div>

  </main>



  <script>
    function hitungPaket() {
      const checkboxes = document.querySelectorAll('input[type="checkbox"]');
      const hargaPaketInput = document.getElementById('harga-paket');
      const durasiPemesanan = document.getElementById('durasi-pemesanan').value;
      const jumlahPemesan = document.getElementById('jumlah-pemesan').value;
      const jumlahTagihan = document.getElementById('jumlah-tagihan');

      let hargaPaket = 0;
      let totalTagihan = 0;

      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          hargaPaket += parseInt(checkbox.value);
        }
      });


      hargaPaketInput.value = hargaPaket;
      totalTagihan = durasiPemesanan * jumlahPemesan * hargaPaket
      jumlahTagihan.value = totalTagihan


    };


    document.getElementById('btn-pesan').addEventListener('click', function() {
            const form = document.getElementById('booking-form');

            const inputs = form.querySelectorAll('input[required]');
            // State
            let isValid = true;

            //Mengecek setiap input jika tidak ada value maka isValid manjadi false
            inputs.forEach((input) => {
                if (!input.value) {
                    isValid = false;
                }
            });

            //Jalankan pengecekkan jika tidak sama dengan isValid atau isValid = false maka tampilkan error modal, jika tidak submit ke database.
            if (!isValid) {
                document.getElementById('error-modal').classList.remove('hidden');
            } else {
                form.submit();
            }
        });

        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('error-modal').classList.add('hidden');
        });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- <script src="js/bootstrap.js"></script> -->
</body>

</html>


<!-- <?php

      // $nama = 'Rizky Imut';

      // echo $nama;

      ?> -->