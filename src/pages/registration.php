<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
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

            if($nama == '' || $email == '' || $pw == '' || $nik == '' || $noHp == ''){
                echo '<script>      
                        alert("data harus lengkap")
                    </script>';
            }else{
                if($noHp > 100000000000 || $nik > 10000000000000000){
                    echo '<script>      
                        alert("Nomor Telepon dan NIK melebihi batas maksimal")
                    </script>';
                }else if($noHp < 10000000000 || $nik < 1000000000000000){
                    echo '<script>      
                        alert("Nomor Telepon dan NIK kurang dari batas yang ditentukan")
                    </script>';   
                }
                else{
                    $cekUser = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' OR nik='$nik'");
                    
                    if(count(mysqli_fetch_all($cekUser, MYSQLI_ASSOC)) > 1){
                        echo '<script>      
                                alert("data harus lengkap")
                            </script>';
                    }else{
                        $query = "INSERT INTO users(nama, password, email, nik, no_telp, role) VALUES('$nama', '$pw', '$email', '$nik', '$noHp', 'masyarakat')";
                        $addUser = mysqli_query($conn, $query);

                        if($addUser){
                            $toLogin = mysqli_query($conn, "SELECT id FROM users WHERE nik=$nik");
                            $resultForLogin = mysqli_fetch_all($toLogin, MYSQLI_ASSOC);
                            $userID = $resultForLogin[0]['id'];
                            header("location:pengaduan.php?user_id=$userID");
                        }else{
                            echo '<script>      
                                    alert("data harus lengkap")
                                </script>';
                        }
                    }
                }
            }
        }
    ?>
    <div>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="">Nama</label></td>
                    <td><input type="text" name="nama" id="" required></td>
                </tr>
                <tr>
                    <td><label for="">Email</label></td>
                    <td><input type="email" name="email" id="" required></td>
                </tr>
                <tr>
                    <td><label for="">Password</label></td>
                    <td><input type="password" name="pw" id="" required></td>
                </tr>
                <tr>
                    <td><label for="">NIK</label></td>
                    <td><input type="number" name="nik" id="" required></td>
                </tr>
                <tr>
                    <td><label for="">Nomor Telepon</label></td>
                    <td><input type="number" name="noHp" id="" required></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">Daftar</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>