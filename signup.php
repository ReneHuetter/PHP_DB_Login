<?php
    include'dbconect.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regestierung</title>
</head>
<body>
    <Form action="sidup.php" method="post">
        <input type="text" name="unname" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Password Bestätigen" required>
        <button type="submit" name="signup">Sigen Up</button>
    </Form>
    <?php
        if(isset($_POST['signup'])) {
            $unname = $_POST['unname'];
            $email = $_POST['email'];
            $password =sha1($_POST['password']);
            $password_confirmation =sha1( $_POST['password_confirmation']);

            if($password == $password_confirmation) {
                $checksql ="SELECT * FROM users WHERE username ='$unname' OR email ='$email'";
                $result = mysqli_query($con, $checksql);

                if(mysqli_num_rows($result) == 0) {
                    $insertsql = "INSERT INTO users (username, email, passwort) VALUES ('$unname','$email','$password')";
                    mysqli_query($con, $insertsql);
                    echo 'Erfolgreich registriert';
                    header("Refresh : 3; url=login.php");
                } else {
                    echo 'Username und Email vergeben';
                }
            }else{
                echo 'Password stimmt nicht überrein';
            }
        }
    ?>
</body>
</html>