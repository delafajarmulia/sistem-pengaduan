<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    header("location:dashboard-admin.php?employee_id=$employeeID");
                }else{
                    echo '<script>      
                            alert("Pastikan email dan password Anda benar")
                        </script>';
                }
            }
        }
    ?>
    <div class="card">
        <form action="" method="post">
            <label for="">Email</label>
            <input type="email" name="email" required>
            <label for="">Password</label>
            <input type="password" name="pw" required>
            <button type="submit" name="login">Masuk</button>
        </form>
    </div>
</body>
</html>