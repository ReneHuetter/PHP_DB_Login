<?php
    include 'dbconect.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="unname" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php
        if(isset($_POST['login'])) {
            $username = $_POST['unname'];
            $password = sha1($_POST['password']);

            $checksql = "SELECT * FROM users WHERE username = '$username' AND passwort = '$password'";
            $result = mysqli_query($con, $checksql);

            if(mysqli_num_rows($result) == 1) {
                echo 'Hallo ' . $username;
            }else {
                echo 'Kein Nutzer gefunden';
            }
        }
    ?>
</body>
</html>