<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pengaduan</title>
    <link rel="stylesheet" href="../styling/pengaduan.css">
</head>
<body>
    <?php
        include '../../connection.php';

        $userID = $_GET['user_id'];
        $getCategories = mysqli_query($conn, "SELECT id, nama FROM categories");

        if(isset($_POST['submit'])){
            $kategoriID = $_POST['kategori'];
            $laporan = $_POST['isiLaporan'];

            if($kategoriID == '' || $laporan == ''){ ?>
                <div class="alert alert-danger">
                    <p>
                        Pastikan laporan yang Anda ingin laporkan telah lengkap.
                    </p>
                </div>
                <?php }else{
                    $query = "INSERT INTO pengaduans(kategori_id, user_id, isi_laporan, tgl_pengaduan, status)
                            VALUES('$kategoriID', '$userID', '$laporan', NOW(), 'proses')";
                $execute = mysqli_query($conn, $query);
                
                if($execute){ ?>
                    <div class="alert alert-success">
                        <p>
                            Terima kasih atas laporan Anda, keluhan Anda segera kami proses.
                        </p>
                    </div>
                    <?php }else{ ?>
                        <div class="alert alert-danger">
                            <p>
                                Gagal menambahkan pengaduan. Silahkan coba beberapa saat lagi.
                            </p>
                        </div>   
                <?php }
            }
        }
    ?>


    <div class="card">
        <h2>Buat Pengaduan</h2>
        <form action="" method="post">
            <div class="con-field">
                <label for="">Kategori Pengaduan</label><br>
                <select name="kategori" id="" required>
                    <?php while($data = mysqli_fetch_assoc($getCategories)){?>
                        <option value="<?php echo $data['id'];?>"><?php echo $data['nama'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="con-field">
                <label for="">Isi Laporan</label><br>
                <textarea name="isiLaporan" id="" cols="30" rows="10" required></textarea>
            </div>
            <div class="field">
                <button type="submit" name="submit" class="btn-kirim">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>