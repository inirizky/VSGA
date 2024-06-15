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
$jsonData = json_encode($data);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disini Cuy</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
  <script src="	https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

</head>

<body>
  <?php include "layout/header.html" ?>


  <main class="p-6 flex flex-col  justify-between gap-2">
    <div class="flex items-center justify-between">
      <h2 class="text-2xl font-semibold">Daftar Pesanan</h2>
      <div class="flex gap-2">
        <button class="bg-gray-600 py-2 px-5 rounded-md text-gray-50" onclick="exportTable('print')">Print</button>
        <button class="bg-gray-600 py-2 px-5 rounded-md text-gray-50" onclick="exportPdf(data)">Export PDF</button>
        <button class="bg-gray-600 py-2 px-5 rounded-md text-gray-50" onclick="exportXls(data)">Export Excel</button>
        <button class="bg-gray-600 py-2 px-5 rounded-md text-gray-50" onclick="jsonExport(data)">Export JSON</button>
        <button class="bg-gray-600 py-2 px-5 rounded-md text-gray-50" onclick="exportTable('csv')">Export CSV</button>
      
      </div>
    </div>
    <div class="relative flex flex-col gap-2 w-full overflow-x-auto mx-auto">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="table">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 md:w-24">
                Nama Pemesan
            </th>
            <th scope="col" class="px-6 py-3 md:w-24">
                No Telp
            </th>
            <th scope="col" class="px-6 py-3 md:w-24">
                Tanggal Pemesanan
            </th>
            <th scope="col" class="px-6 py-3 md:w-24">
                Durasi Pemesanan
            </th>
            <th scope="col" class="px-6 py-3 md:w-24">
                Jumlah Pemesanan
            </th>
            <th scope="col" class="px-6 py-3 md:w-24">
                Paket Perjalanan
            </th>
            <th scope="col" class="px-6 py-3 md:w-24">
                Harga Paket
            </th>
            <th scope="col" class="px-6 py-3 md:w-24 w-72">
                Jumlah Tagihan
            </th>
            <th scope="col" class="px-6 py-3 md:w-24">
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
            <td class="px-6 py-4 ">
                <?= $row['booking_date']; ?>
            </td>
            <td class="px-6 py-4">
                <?= $row['duration']; ?> Hari
            </td>
            <td class="px-6 py-4">
                <?= $row['number_of_people']; ?> Orang
            </td>
            <td class="py-4 flex gap-2 md:w-64">
                <?php if ($row['isHotel'] == 1) : ?>
                <span class="bg-sky-800  text-zinc-50 p-1 font-semibold rounded-md">Penginapan</span>
                <?php endif; ?>
                <?php if ($row['isTransport'] == 1) : ?>
                <span class="bg-green-800 text-zinc-50 p-1 font-semibold rounded-md">Transportasi</span>
                <?php endif; ?>
                <?php if ($row['isCatering'] == 1) : ?>
                <span class="bg-orange-800 text-zinc-50 p-1 font-semibold rounded-md">Makanan</span>
                <?php endif; ?>
            </td>
            <td class="px-6 py-4 md:w-32">
                Rp
                <?= $row['packet_price']; ?>
            </td>
            <td class="px-6 py-4 md:w-36 ">
                Rp
                <?= $row['total_price']; ?>
            </td>
            <td class="py-4 flex gap-4 md:w-44 w-52">
                <a href="update.php?id=<?= $row['id']; ?>" class="bg-blue-700 text-white py-2 px-4 rounded-md">Update</a>
                <a data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="cursor-pointer bg-red-700 text-white py-2 px-4 rounded-md">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>

    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <div class="p-4 md:p-5 text-center">
            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
            <a data-modal-hide="popup-modal" href="delete.php?id=<?= $row['id']; ?>" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
              Yes, I'm sure
            </a>
            <button data-modal-hide="popup-modal" type="button" class="py-2.5 cursor-pointer px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    var data = <?php echo $jsonData; ?>;

    function formatRupiah(value) {
      return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
   }

   function exportPdf(data) {
    // console.log(data);
    var pdf = new jsPDF();
    
    // Mengatur data untuk tabel
    var tableData = data.map(row => ({
      "Nama Pemesan": row.name,
      "No Telp": row.phone_number,
      "Tanggal Pemesanan": row.booking_date,
      "Durasi Pemesanan": row.duration + " Hari",
      "Jumlah Pemesanan": row.number_of_people + " Orang",
      "Paket Perjalanan": formatPaket(row), // Fungsi untuk memformat kolom 'Paket Perjalanan'
      "Harga Paket": formatRupiah(row.packet_price),
      "Jumlah Tagihan": formatRupiah(row.total_price),
    }));
    
    // console.log(tableData);
  pdf.autoTable({
    head: [['Nama', 'No Telp', 'Tanggal Pemesanan', 'Durasi', 'Jumlah Pemesan', 'Paket Perjalanan', 'Harga Paket', 'Jumlah Tagihan']],
    body: tableData.map(Object.values), // Ubah objek menjadi array nilai
  styles: { cellPadding: 1, fontSize: 7 },
  });

  window.open(URL.createObjectURL(pdf.output("blob")));
}



// Fungsi untuk memformat kolom 'Paket Perjalanan'
  function formatPaket(row) {
    var paket = [];
    if (row.isHotel == 1) {
      paket.push("Penginapan");
    }
    if (row.isTransport == 1) {
      paket.push("Transportasi");
    }
    if (row.isCatering == 1) {
      paket.push("Makanan");
    }
    return paket.join(", ");
  }


  function exportXls(data) {
    var tableData = data.map(row => ({
      "Nama Pemesan": row.name, 
      "No Telp": row.phone_number,
      "Tanggal Pemesanan": row.booking_date,
      "Durasi Pemesanan": row.duration + " Hari",
      "Jumlah Pemesanan": row.number_of_people + " Orang",
      "Paket Perjalanan": formatPaket(row),
      "Harga Paket": formatRupiah(row.packet_price),
      "Jumlah Tagihan": formatRupiah(row.total_price),
    }));

    var ws = XLSX.utils.json_to_sheet(tableData);
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Data Pemesanan");

    XLSX.writeFile(wb, "data_pemesanan.xlsx");
  }


   function jsonExport(data) {
      
    var tableData = data.map(row => ({
      "Nama Pemesan": row.name, 
      "No Telp": row.phone_number,
      "Tanggal Pemesanan": row.booking_date,
      "Durasi Pemesanan": row.duration + " Hari",
      "Jumlah Pemesanan": row.number_of_people + " Orang",
      "Paket Perjalanan": formatPaket(row),
      "Harga Paket": formatRupiah(row.packet_price),
      "Jumlah Tagihan": formatRupiah(row.total_price),
    }));

      const jsonContent = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(tableData));
      const link = document.createElement("a");
      link.setAttribute("href", jsonContent);
      link.setAttribute("download", "Daftar-Pesanan.json");
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    };
  </script>








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
        link.setAttribute('download', 'Daftar-Pesanan.csv');
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