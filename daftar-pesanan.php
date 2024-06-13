<?php

include "service/db.php";

$sql = "SELECT * FROM tb_tiket";

$result = $db->query($sql);

$data = [];
if ($result->num_rows > 0) {
  // Output data dari setiap baris
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
} else {
  echo "0 results";
}


// echo $data


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

    <div class="relative flex flex-col gap-2 overflow-x-auto w-full mx-auto">
      <div class="flex items-center justify-between">
        <h2 class="">Daftar Pesanan</h2>
        <div class="flex gap-2">
          <button class="bg-gray-600 py-2 px-5 rounded-md text-gray-50" onclick="exportTable('print')">Print</button>
          <!-- <button class="bg-gray-600 py-2 px-5 rounded-md text-gray-50" onclick="exportTable('pdf')">Save as PDF</button> -->
          <button class="bg-gray-600 py-2 px-5 rounded-md text-gray-50" onclick="exportTable('csv')">Save as CSV</button>
        </div>
      </div>
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>

            <th scope="col" class="px-6 py-3">
              Nama Pemesan
            </th>
            <th scope="col" class="px-6 py-3">
              No Telp
            </th>
            <th scope="col" class="px-6 py-3">
              Tanggal Pemesanan
            </th>
            <th scope="col" class="px-6 py-3">
              Durasi Pemesanan
            </th>
            <th scope="col" class="px-6 py-3">
              Jumlah Pemesanan
            </th>
            <th scope="col" class="px-6 py-3">
              Paket Perjalanan
            </th>
            <th scope="col" class="px-6 py-3">
              Harga Paket
            </th>
            <th scope="col" class="px-6 py-3">
              Jumlah Tagihan
            </th>
            <th scope="col" class="px-6 py-3">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $row) : ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $row['name']; ?>
              </th>
              <td class="px-6 py-4">
                <?= $row['phone_number']; ?>
              </td>
              <td class="px-6 py-4">
                <?= $row['booking_date']; ?>
              </td>
              <td class="px-6 py-4">
                <?= $row['duration']; ?> Hari
              </td>
              <td class="px-6 py-4">
                <?= $row['number_of_people']; ?> Orang
              </td>
              <td class="py-4 flex gap-4">
                <?php if ($row['isHotel'] == 1) : ?>
                  <span class="bg-green-700 text-white p-2 rounded-md">Penginapan</span>
                <?php endif; ?>
                <?php if ($row['isTransport'] == 1) : ?>
                  <span class="bg-green-700 text-white p-2 rounded-md">Transportasi</span>
                <?php endif; ?>
                <?php if ($row['isCatering'] == 1) : ?>
                  <span class="bg-green-700 text-white p-2 rounded-md">Makanan</span>
                <?php endif; ?>
              </td>
              <td class="px-6 py-4">
                Rp
                <?= $row['packet_price']; ?>
              </td>
              <td class="px-6 py-4">
                Rp
                <?= $row['total_price']; ?>
              </td>
              <td class=" py-4 flex gap-4">
                <a href="pesan.php?id=<?= $row['id']; ?>" class="bg-blue-700 text-white py-2 px-4 rounded-md">Update</a>
                <a href="delete.php?id=<?= $row['id']; ?>" class="bg-red-700 text-white py-2 px-4 rounded-md">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>


  </main>

  <script>
    function exportTable(type) {
      // Mendapatkan tabel yang ingin di-export
      const table = document.querySelector('table');

      if (type === 'print') {
        // Print tabel
        window.print();
      } else if (type === 'pdf') {
        // Save as PDF
        const doc = new jsPDF();
        doc.autoTable({
          html: table
        });
        doc.save('table.pdf');
      } else if (type === 'csv') {
        // Save as CSV
        const csv = [];
        const rows = table.querySelectorAll('tr');

        // Membuat header CSV
        const header = Array.from(rows[0].children).map(th => th.innerText.trim());
        csv.push(header.join(','));

        // Mengambil data dari setiap baris tabel
        for (let i = 1; i < rows.length; i++) {
          const row = Array.from(rows[i].children).map(td => td.innerText.trim());
          csv.push(row.join(','));
        }

        // Membuat blob CSV
        const csvContent = csv.join('\n');
        const blob = new Blob([csvContent], {
          type: 'text/csv;charset=utf-8;'
        });
        const url = URL.createObjectURL(blob);

        // Membuat link untuk download CSV
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'table.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      }
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- <script src="js/bootstrap.js"></script> -->
</body>

</html>


<!-- <?php

      // $nama = 'Rizky Imut';

      // echo $nama;

      ?> -->