<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styling/login.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->
</head>
<body>
    <?php
        include '../../connection.php';

        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $pw = $_POST['pw'];

            $user = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$pw'");
            $userFind = mysqli_fetch_all($user, MYSQLI_ASSOC);
            $userAvailabled = count($userFind);

            if($userAvailabled == 1){
                $userID = $userFind[0]['id'];
                header("location:pengaduan.php?user_id=$userID");
            }else{
                $admin = mysqli_query($conn, "SELECT id FROM employees WHERE email='$email' AND password='$pw'");
                $adminFind = mysqli_fetch_all($admin, MYSQLI_ASSOC);
                $adminAvailabled = count($adminFind);

                if($adminAvailabled == 1){
                    $employeeID = $adminFind[0]['id'];
                    header("location:admin-pages/dashboard-admin.php?employee_id=$employeeID");
                }else{ ?>
                    <div class="alert alert-danger">
                        <p>
                            Pastikan Anda telah mengisikan Email dan Password dengan benar.
                        </p>
                    </div>
                <?php }
            }
        }
    ?>
    <div class="card border">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="con-field">
                <label for="">Email</label><br>
                <input type="email" name="email" required>
            </div>
            <div class="con-field">
                <label for="">Password</label><br>
                <input type="password" name="pw" class="form-control mr-3" required>
            </div>
            <div class="con-field">
                <button type="submit" name="login" class="btn-login">Masuk</button>
                <div class="daftar">
                    <p>Belum punya akun? <a href="registration.php">Daftar sekarang</a></p>
                </div>
            </div>
        </form>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
</body>
</html>