<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <link rel="stylesheet" href="../../styling/detail-pengaduan.css">
</head>
<body>
<?php
        include '../../../connection.php';

        $employeeID = $_GET['employee_id'];
        $pengaduanID = $_GET['pengaduan_id'];
        $pengaduans = mysqli_query($conn, "SELECT p.id AS pengaduan_id, isi_laporan, tgl_pengaduan, status, u.nama AS nama
                                            FROM pengaduans AS p 
                                            LEFT JOIN users AS u ON p.user_id=u.id
                                            WHERE p.id=$pengaduanID");

        if(isset($_POST['submit'])){
            $isiTanggapan = $_POST['tanggapan'];

            $addTanggapan = mysqli_query($conn, "INSERT INTO tanggapans(pegawai_id, pengaduan_id, isi_tanggapan, tgl_tanggapan) 
                                                VALUES('$employeeID', '$pengaduanID', '$isiTanggapan', NOW())");
            if($addTanggapan){
                echo'';
            }else{
                die("server error");
            }
        }
    ?>

    <div class="container">
        <div class="card">
            <?php while($pengaduan = mysqli_fetch_assoc($pengaduans)){ 
                $pengaduanID = $pengaduan['pengaduan_id'];
                $status = $pengaduan['status'];
                ?>
                <div class="pengaduan">
                    <div class="header-pengaduan">
                        <div class="title-pengaduan">
                            <h2><?php echo $pengaduan['nama'];?></h2>
                            <h5 class="<?= $status == 'proses' ? 'label-proses' : 'label-selesai'?>"><?php echo $pengaduan['status'];?></h5>
                        </div>
                        <div>
                            <a href="edit-status.php?pengaduan_id=<?php echo $pengaduanID; ?>&&status=<?php echo $status;?>&&employee_id=<?php echo $employeeID;?>">
                                <div class="btn <?= $status == 'proses' ? 'edit-to-end' : 'edit-to-process' ?>">Ubah Status</div>
                            </a>
                        </div>
                    </div>
                    <p><?php echo $pengaduan['isi_laporan'];?></p>
                    <h5 class="date"><?php echo $pengaduan['tgl_pengaduan'];?></h5>
                    <hr>
                </div>
                <div class="card-body">
                    <?php 
                        $tanggapans = mysqli_query($conn, "SELECT isi_tanggapan, tgl_tanggapan, e.nama AS nama_penanggap FROM tanggapans AS t
                                                            LEFT JOIN employees AS e ON t.pegawai_id=e.id
                                                            WHERE pengaduan_id=$pengaduanID");
                        while($tanggapan = mysqli_fetch_assoc($tanggapans)){
                    ?>
                            <h4><?php echo $tanggapan['nama_penanggap'];?></h4>
                            <h5 class="date"><?php echo $tanggapan['tgl_tanggapan'];?></h5>
                            <p><?php echo $tanggapan['isi_tanggapan'];?></p>
                    <?php } ?>
                    <!-- <hr> -->
                    <form action="" method="post">
                        <label for="">Tambahkan Tanggapan</label><br>
                        <textarea name="tanggapan" id="" cols="" rows=""></textarea><br>
                        <button type="submit" name="submit" class="btn-submit">Tambahkan</button>
                    </form>
                </div>
            <?php } ?>
            <div class="add-tanggapan">
                
            </div>
        </div>

        
    </div>
</body>
</html>