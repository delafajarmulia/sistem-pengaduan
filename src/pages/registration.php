<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="../styling/registration.css">
</head>
<body>
    <?php
        include '../../connection.php';

        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $pw = $_POST['pw'];
            $nik = $_POST['nik'];
            $noHp = $_POST['noHp'];

            if($nama == '' || $email == '' || $pw == '' || $nik == '' || $noHp == ''){ ?>
                <div class="alert alert-danger">
                    <p>
                        Pastikan data yang Anda isikan telah lengkap.
                    </p>
                </div>
            <?php }else{
                if($noHp > 100000000000 || $nik > 10000000000000000){ ?>
                    <div class="alert alert-danger">
                        <p>
                            Nomor Telepon dan NIK melebihi batas maksimal.
                        </p>
                    </div>
                <?php }else if($noHp < 10000000000 || $nik < 1000000000000000){ ?>
                        <div class="alert alert-danger">
                            <p>
                                Nomor Telepon dan NIK kurang dari batas yang ditentukan.
                            </p>
                        </div>  
                <?php }
                else{
                    $cekUser = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' OR nik='$nik'");
                    
                    if(count(mysqli_fetch_all($cekUser, MYSQLI_ASSOC)) > 1){ ?>
                        <div class="alert alert-danger">
                            <p>
                                Sepertinya Email ataupun NIK Anda telah terdaftar. Silahkan melakukan login
                                <a href="login.php">disini</a>
                            </p>
                        </div>
                    <?php }else{
                        $query = "INSERT INTO users(nama, password, email, nik, no_telp) VALUES('$nama', '$pw', '$email', '$nik', '$noHp')";
                        $addUser = mysqli_query($conn, $query);

                        if($addUser){
                            $toLogin = mysqli_query($conn, "SELECT id FROM users WHERE nik=$nik");
                            $resultForLogin = mysqli_fetch_all($toLogin, MYSQLI_ASSOC);
                            $userID = $resultForLogin[0]['id'];
                            header("location:pengaduan.php?user_id=$userID");
                        }else{ ?>
                            <div class="alert alert-danger">
                                <p>
                                    Gagal menambahkan data. Silahkan coba beberapa saat lagi.
                                </p>
                            </div>
                        <?php }
                    }
                }
            }
        }
    ?>
    <div class="card-con">
        <h2>Registrasi</h2>
        <form action="" method="post">
            <div class="con-field">
                <label for="">Nama</label><br>
                <input type="text" name="nama" id="" required>
            </div>
            <div class="con-field">
                <label for="">Email</label><br>
                <input type="email" name="email" id="" required>
            </div>
            <div class="con-field">
                <label for="">Password</label><br>
                <input type="password" name="pw" id="" required>
            </div>
            <div class="con-field">               
                <label for="">NIK</label><br>
                <input type="number" name="nik" id="" required>
            </div>
            <div class="con-field">
                <label for="">Nomor Telepon</label><br>
                <input type="number" name="noHp" id="" required>
            </div>
            <div class="con-field">
                <button type="submit" name="submit" class="btn-regis">Daftar</button>
                <div class="login">
                    <p>Sudah punya akun? <a href="login.php">Masuk disini</a></p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>