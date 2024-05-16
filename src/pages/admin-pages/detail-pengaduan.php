<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
</head>
<body>
<?php
        include '../../../connection.php';

        $employeeID = $_GET['employee_id'];
        $pengaduanID = $_GET['pengaduan_id'];
        $pengaduans = mysqli_query($conn, "SELECT * FROM pengaduans WHERE id=$pengaduanID");

        if(isset($_POST['submit'])){
            $isiTanggapan = $_POST['tanggapan'];

            $addTanggapan = mysqli_query($conn, "INSERT INTO tanggapans(pegawai_id, pengaduan_id, isi_tanggapan, tgl_tanggapan) 
                                                VALUES('$employeeID', '$pengaduanID', '$isiTanggapan', NOW())");
            if($addTanggapan){
                echo 'ok';
            }else{
                echo 'gak ok';
            }
        }
    ?>

    <div class="container">
        <div class="card">
            <div class="pengaduan">
                <?php while($pengaduan = mysqli_fetch_assoc($pengaduans)){ 
                    $pengaduanID = $pengaduan['id'];
                    $status = $pengaduan['status'];
                    ?>
                    <a href="edit-status.php?pengaduan_id=<?php echo $pengaduanID; ?>&&status=<?php echo $status;?>&&employee_id=<?php echo $employeeID;?>">Edit status</a>
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

        <div class="add-tanggapan">
            <form action="" method="post">
                <label for="">Tambahkan Tanggapan</label><br>
                <textarea name="tanggapan" id="" cols="30" rows="10"></textarea><br>
                <button type="submit" name="submit">Tambahkan</button>
            </form>
        </div>
    </div>
</body>
</html>