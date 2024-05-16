<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../../styling/index-admin.css">
</head>
<body>
    <?php
        include '../../../connection.php';

        $employeeID = $_GET['employee_id'];
        $pengaduans = mysqli_query($conn, "SELECT p.id AS id, p.isi_laporan AS isi_laporan, p.status AS status, u.nama AS nama FROM pengaduans AS p 
                                            LEFT JOIN users AS u ON p.user_id=u.id");
    ?>

    <div class="container px-5 w-100 d-flex">
        <div class="sidebar">
            <?php 
                include_once 'dashboard-admin.php';
            ?>
        </div>
        <div class="pengaduan mx-5">
            <div class="mx-auto">
                <h1 class="text-dark">hello</h1>                
            </div>
            <?php while($pengaduan = mysqli_fetch_assoc($pengaduans)){ 
                        $pengaduanID = $pengaduan['id'];
                        $status = $pengaduan['status'];
                        ?>
                <div class="card mt-3 w-100 p-3 mb-3">
                    <div class="card-header text-white bg-gradient <?= $status == 'proses' ? 'bg-warning' : 'bg-success'?>">
                        <div class="info-pengaduan d-flex justify-content-between">
                            <div class="pengadu-name">
                                <h5><?php echo $pengaduan['nama'];?></h5>
                            </div>
                            <div class="go-to-action">
                                <a href="edit-status.php?pengaduan_id=<?php echo $pengaduanID; ?>&&status=<?php echo $status;?>&&employee_id=<?php echo $employeeID;?>" class="btn btn-primary">Ubah status</a>
                                <a href="detail-pengaduan.php?pengaduan_id=<?php echo $pengaduanID;?>&&employee_id=<?php echo $employeeID;?>" class="btn btn-primary">Lihat detail</a>
                            </div>
                        </div>
                        <p><?php echo $pengaduan['isi_laporan']; ?></p>
                    </div class="card-body ml-5">
                        <?php 
                            $tanggapans = mysqli_query($conn, "SELECT t.id, t.pengaduan_id AS pengaduanID, t.isi_tanggapan, e.nama AS nama_employee FROM tanggapans AS t
                                                                LEFT JOIN employees AS e ON t.pegawai_id=e.id
                                                                WHERE pengaduan_id=$pengaduanID");
                            while($tanggapan = mysqli_fetch_assoc($tanggapans)){
                        ?>
                                <h6 class="card-title pt-3 "><?php echo $tanggapan['nama_employee'];?></h6>
                                <p class="card-text"><?php echo $tanggapan['isi_tanggapan'];?></p>
                        <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>