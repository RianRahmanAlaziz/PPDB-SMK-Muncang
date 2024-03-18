<?php 
session_start();
include '../../koneksi/koneksi.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="../../assets/img/icon.png">
     <title>Data Peserta</title>
   </head>
<body>
<div class="sidebar close">
    <div class="logo-details">
    <i class='bx bxs-school icon'></i>
      <div class="logo_name">AL-KAUTSAR</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-links">
      <li>
        <a href="../index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <!-- dashboard User -->
  <?php 
     $level = $_SESSION['a_global']->level == 'user';
     if($level){
   ?>
      <li>
       <a href="data-user.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Data User</span>
       </a>
       <span class="tooltip">Data User</span>
     </li>
     <li>
      <div class="iocn-link">
        <a href="#">
          <i class='bx bx-collection' ></i>
          <span class="links_name">Cetak Pendaftaran</span>
        </a>
        <i class='bx bxs-chevron-down arrow' ></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="include/cetak-pendaftaran.php">Cetak Pendaftaran</a></li>
        <li><a href="#">-</a></li>
      </ul>
    </li>
    <?php 
            }else{
         ?>
    <!-- akhir dashboard User -->
    <!-- dashboard admin -->
      <li>
        <div class="iocn-link">
          <a href="data-peserta.php">
            <i class='bx bx-collection' ></i>
            <span class="links_name">Data Peserta</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="data-peserta.php">Data Peserta</a></li>
          <li><a href="data-guru.php">Data Guru</a></li>
          <li><a href="data-mapel.php">Data Pelajaran</a></li>

        </ul>
      </li>
     <?php } ?>
     <!-- akhir dashboard admin -->

    <li class="profile">
    <a href="../../logout.php">
        <i class='bx bx-log-out'></i>
        <span class="links_name">Log Out</span>
      </a>
     </li>
    </ul>
  </div>
  <section class="home-section">
  <div class="container">
       <h4>Data Peserta</h4>
        <table class="table" border="1">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Pendaftaran</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Jenis Kelamin</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
              $no = 1;
              $list_peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran");
              while($row = mysqli_fetch_array($list_peserta)){ 
           ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['id_pendaftaran'] ?></td>
              <td><?php echo $row['nm_peserta'] ?></td>
              <td><?php echo $row['jurusan'] ?></td>
              <td><?php echo $row['jk'] ?></td>
              <td>
                <a href="detail.peserta.php?id=<?php echo  $row['id_pendaftaran']; ?>">Detail</a>    ||    
                <a href="hapus-peserta.php?id=<?php echo  $row['id_pendaftaran']; ?>" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Ini?')">Hapus</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

    </div>
  </section>
  <script src="../../assets/js/dashboard.js"></script>
</body>
</html>
