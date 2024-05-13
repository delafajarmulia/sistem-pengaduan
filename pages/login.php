<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include '../connection.php';

        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $pw = $_POST['pw'];

            $user = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$pw'");
            if(count(mysqli_fetch_all($user, MYSQLI_ASSOC)) < 1){
                echo "tak de";
            }else{
                echo " ada";
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