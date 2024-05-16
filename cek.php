<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <?php
        include 'connection.php';

        // $employeeID = $_GET['employee_id'];
        $pengaduans = mysqli_query($conn, "SELECT * FROM pengaduans");
    ?>

    <div class="container">
        <div class="card">
            <div class="pengaduan">
                <?php while($pengaduan = mysqli_fetch_assoc($pengaduans)){ 
                    $pengaduanID = $pengaduan['id'];
                    $status = $pengaduan['status'];
                    ?>
                    <a href="edit-status.php?pengaduan_id=<?php echo $pengaduanID; ?>&&status=<?php echo $status;?>&&employee_id=<?php echo $employeeID;?>">Edit status</a>
                    <a href="detail-pengaduan.php?pengaduan_id=<?php echo $pengaduanID;?>&&employee_id=<?php echo $employeeID;?>">Lihat detail</a>
                    <p><?php echo $pengaduan['isi_laporan']; ?></p>
                        <div class="tanggapan">
                            <?php 
                                $tanggapans = mysqli_query($conn, "SELECT * FROM tanggapans WHERE pengaduan_id=$pengaduanID");
                                while($tanggapan = mysqli_fetch_assoc($tanggapans)){
                            ?>
                                    <p><?php echo $tanggapan['isi_tanggapan'];?></p>
                            <?php } ?>
                        </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>