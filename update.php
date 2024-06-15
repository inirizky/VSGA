<?php
include "service/db.php";

$id = $_GET['id'] ?? null;

if ($id) {
    // Ambil data berdasarkan ID
    $sql = "SELECT * FROM tb_tiket WHERE id = $id";
    $result = $db->query($sql);
    $data = $result->fetch_assoc();

} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disini Cuy</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php include "layout/header.html" ?>

  <main class="p-6 flex flex-col md:flex-row justify-between gap-2">
    <form class="w-full max-w-2xl mx-auto" action="update.php?id=<?= $id ?>" method="POST">
      <div class="flex gap-4">
        <div class="mb-5 w-full">
          <label for="nama" class="block mb-2 w-full text-sm font-medium text-gray-900">Nama Pemesan</label>
          <input type="text" name="nama" value="<?= isset($data['name']) ? $data['name'] : '' ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
        <div class="mb-5 w-full">
          <label for="nohp" class="block mb-2 w-full text-sm font-medium text-gray-900">No HP / Telp</label>
          <input type="number" name="nohp" value="<?= isset($data['phone_number']) ? $data['phone_number'] : '' ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
      </div>
      <div class="flex gap-4">
        <div class="mb-5 w-full">
          <label for="tanggal-pemesanan" class="block mb-2 w-full text-sm font-medium text-gray-900">Tanggal Pemesanan</label>
          <input type="date" name="tanggal-pemesanan" value="<?= isset($data['booking_date']) ? $data['booking_date'] : '' ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
        <div class="mb-5 w-full">
          <label for="durasi-pemesanan" class="block mb-2 text-sm font-medium text-gray-900 ">Durasi Pemesanan</label>
          <div class="flex">
            <input type="text" id="durasi-pemesanan" name="durasi-pemesanan" value="<?= isset($data['duration']) ? $data['duration'] : '' ?>" class=" rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-r-lg border-gray-300">
              hari
            </span>
          </div>
        </div>
      </div>

      <div class="mb-5">
        <label for="jumlah-pemesan" class="block mb-2 text-sm font-medium text-gray-900 ">Jumlah Pemesan</label>
        <div class="flex">
          <input type="text" id="jumlah-pemesan" name="jumlah-pemesan" value="<?= isset($data['number_of_people']) ? $data['number_of_people'] : '' ?>" class=" rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
          <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-r-lg border-gray-300">
            orang
          </span>
        </div>
      </div>
      <div class="mb-5">
        <label class="block mb-2 w-full text-sm font-medium text-gray-900">Layanan Paket Perjalanan</label>
        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
            <div class="flex items-center ps-3">
              <input id="penginapan" name="penginapan" type="checkbox" value="1000000" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" <?= isset($data['isHotel']) && $data['isHotel'] ? 'checked' : '' ?> onchange="hitungPaket()">
              <label for="penginapan" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Penginapan (Rp1.000.000)</label>
            </div>
          </li>
          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
            <div class="flex items-center ps-3">
              <input id="transportasi" name="transportasi" type="checkbox" value="1200000" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" <?= isset($data['isTransport']) && $data['isTransport'] ? 'checked' : '' ?> onchange="hitungPaket()">
              <label for="transportasi" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Transportasi (Rp1.200.000)</label>
            </div>
          </li>
          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
            <div class="flex items-center ps-3">
              <input id="makanan" name="makanan" type="checkbox" value="500000" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" <?= isset($data['isCatering']) && $data['isCatering'] ? 'checked' : '' ?> onchange="hitungPaket()">
              <label for="makanan" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Makanan (Rp500.000)</label>
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
          <input type="text" name="harga-paket" id="harga-paket" value="<?= isset($data['packet_price']) ? $data['packet_price'] : '' ?>" class="rounded-r-lg bg-gray-200 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
        </div>
      </div>
      <div class="mb-5">
        <label for="jumlah-tagihan" class="block mb-2 text-sm font-medium text-gray-900 ">Jumlah Tagihan</label>
        <div class="flex">
          <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-l-lg border-gray-300">
            Rp
          </span>
          <input type="text" name="jumlah-tagihan" id="jumlah-tagihan" value="<?= isset($data['total_price']) ? $data['total_price'] : '' ?>" class="rounded-r-lg bg-gray-200 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
        </div>
      </div>
      <div class="flex items-start mb-5">
        <button type="submit" name="pesan" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Pesan</button>
    </form>
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
      totalTagihan = durasiPemesanan * jumlahPemesan * hargaPaket;
      jumlahTagihan.value = totalTagihan;
    };
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
<?php
include "service/db.php";

$id = $_GET['id'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $nohp = $_POST['nohp'];
        $tanggal_pemesanan = $_POST['tanggal-pemesanan'];
        $durasi_pemesanan = $_POST['durasi-pemesanan'];
        $jumlah_pemesan = $_POST['jumlah-pemesan'];
        $isHotel = isset($_POST['penginapan']) ? 1 : 0;
        $isTransport = isset($_POST['transportasi']) ? 1 : 0;
        $isFood = isset($_POST['makanan']) ? 1 : 0;
        $harga_paket = $_POST['harga-paket'];
        $jumlah_tagihan = $_POST['jumlah-tagihan'];

        $sql = "UPDATE tb_tiket SET 
                name = '$nama', 
                phone_number = '$nohp', 
                booking_date = '$tanggal_pemesanan', 
                duration = '$durasi_pemesanan', 
                number_of_people = '$jumlah_pemesan', 
                isHotel = '$isHotel', 
                isTransport = '$isTransport', 
                isCatering = '$isFood', 
                packet_price = '$harga_paket', 
                total_price = '$jumlah_tagihan' 
                WHERE id = $id";

        if ($db->query($sql) === TRUE) {
          echo "
          <script>
            Swal.fire({
              title: 'Sukses!',
              text: 'Berhasil input data pemesanan!',
              icon: 'success',
              timer: 1500,
            }).then(() => {
                window.location = 'daftar-pesanan.php';
            });
          </script>";
        } else {
            echo "Data Gagal";
        }
    }

?>