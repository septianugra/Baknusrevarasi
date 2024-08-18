<?php
include 'templates/header.php';
require 'function.php';
?>      
  <h1 class="display-4" style="margin-top: -50px;">Status Pengaduan Anda</h1>

  <div class="row">
    <div class="col">
        <?php
          $keyword = $_POST['keyword'];
          $data = query("SELECT * FROM pengaduan WHERE id = '$keyword'");
          if ($data) {
          foreach ($data as $d) :
        ?>
          <p>Nomor Pengaduan : <?= $d['id']; ?></p>
          <p>Tanggal Pengaduan : <?= $d['tgl_lapor']; ?></p>
          <p>Nama Pelapor : <?= $d['n_pelapor']; ?></p>
          <p>Jurusan : <?= $d['j_pelapor']; ?></p>
          <p>Ruang / Kelas : <?= $d['d_pelapor']; ?></p>
          <p>Nama Barang : <?= $d['n_barang']; ?></p>
          <p>Keterangan : <?= $d['ket']; ?></p>
          <p>Status : <span style="display: inline-block; padding: 5px 10px; background-color: <?= getStatusColor($d['status']); ?>; color: white; border-radius: 5px;"><?= $d['status']; ?></span></p>
          <p><b><u>Catatan dari petugas</u></b> <br><?= $d['ket_petugas']; ?></p>
          <br>
          <a href="index.php" class="btn btn-sm btn-primary" style="width: 80px;"><span class="fas fa-arrow-left mr-2"></span>Back</a>
        <?php
        endforeach;
        } else {
            echo "<p>Data pengaduan tidak ditemukan.</p>";
        }
        ?>
    </div>
    <?php
function getStatusColor($status) {
    switch($status) {
        case 'Sedang diproses':
            return '#f0ad4e'; // Warna kuning
        case 'Selesai diproses':
            return '#5cb85c'; // Warna hijau
        case 'Dibatalkan':
            return '#d9534f'; // Warna merah
        default:
            return '#777'; // Warna abu-abu untuk status lain
    }
}
?>

    
  </div>
<?php
include 'templates/footer.php';
?>
