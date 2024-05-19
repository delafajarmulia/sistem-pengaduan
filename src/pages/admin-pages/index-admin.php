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

        // include_once 'dashboard-admin.php';
    ?>

    <div class="container">
        <!-- <div class="sidebar">
            
        </div> -->
        <div class="content">
            <div class="title">
                <h1 class="">hello</h1>                
            </div>
            <?php
                if(isset($_GET['msg'])){
                    $msg = $_GET['msg'];
                    if($msg == 'update'){ ?>
                        <div class="alert">
                            Berhasil mengubah status data
                        </div>
                    <?php }
                }
            ?>
            <?php while($pengaduan = mysqli_fetch_assoc($pengaduans)){ 
                        $pengaduanID = $pengaduan['id'];
                        $status = $pengaduan['status'];
                        ?>
                <div class="card">
                    <div class="card-header">
                        <div class="info-pengaduan ">
                            <div class="pengadu-name">
                                <h2><?php echo $pengaduan['nama'];?></h2>
                                <h5 class="<?= $status == 'proses' ? 'label-proses' : 'label-selesai'?>"><?php echo $pengaduan['status'];?></h5>
                            </div>
                            <div class="go-to-action">
                                <a href="edit-status.php?pengaduan_id=<?php echo $pengaduanID; ?>&&status=<?php echo $status;?>&&employee_id=<?php echo $employeeID;?>">
                                    <div class="btn <?= $status == 'proses' ? 'edit-to-end' : 'edit-to-process' ?>">Ubah Status</div>
                                </a>
                                <a href="detail-pengaduan.php?pengaduan_id=<?php echo $pengaduanID;?>&&employee_id=<?php echo $employeeID;?>">
                                    <div class="btn btn-detail">Lihat Detail</div>
                                </a>
                            </div>
                        </div>
                        <p><?php echo $pengaduan['isi_laporan']; ?></p>
                        <hr>
                    </div>
                    <div class="card-body">
                        <?php 
                            $tanggapans = mysqli_query($conn, "SELECT t.id, t.pengaduan_id AS pengaduanID, t.isi_tanggapan, e.nama AS nama_employee FROM tanggapans AS t
                                                                LEFT JOIN employees AS e ON t.pegawai_id=e.id
                                                                WHERE pengaduan_id=$pengaduanID");
                            while($tanggapan = mysqli_fetch_assoc($tanggapans)){
                        ?>
                                <h4 class="card-title"><?php echo $tanggapan['nama_employee'];?></h4>
                                <p class="card-text"><?php echo $tanggapan['isi_tanggapan'];?></p>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>