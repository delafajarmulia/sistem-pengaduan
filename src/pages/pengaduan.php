<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pengaduan</title>
</head>
<body>
    <?php
        include '../../connection.php';

        $userID = $_GET['user_id'];
        $getCategories = mysqli_query($conn, "SELECT id, nama FROM categories");

        if(isset($_POST['submit'])){
            $kategoriID = $_POST['kategori'];
            $laporan = $_POST['isiLaporan'];

            if($kategoriID == '' || $laporan == ''){
                echo '<script>      
                        alert("data harus lengkap")
                    </script>';
            }else{
                $query = "INSERT INTO pengaduans(kategori_id, user_id, isi_laporan, tgl_pengaduan, status)
                            VALUES('$kategoriID', '$userID', '$laporan', NOW(), 'proses')";
                $execute = mysqli_query($conn, $query);

                if($execute){
                    echo '<script>      
                        alert("Terima kasih atas laporan Anda, keluhan Anda segera kami proses")
                    </script>';
                }else{
                    echo '<script>      
                        alert("masih error")
                    </script>';
                }
            }
        }
    ?>

    <div class="card-pengaduan">
        <form action="" method="post">
            <div class="field">
                <label for="">Kategori Pengaduan</label><br>
                <select name="kategori" id="" required>
                    <?php while($data = mysqli_fetch_assoc($getCategories)){?>
                        <option value="<?php echo $data['id'];?>"><?php echo $data['nama'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="field">
                <label for="">Isi Laporan</label><br>
                <textarea name="isiLaporan" id="" cols="30" rows="10" required></textarea>
            </div>
            <div class="field">
                <button type="submit" name="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>