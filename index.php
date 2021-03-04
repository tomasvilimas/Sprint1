<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
</head>

<body>

    <?php
    if (
        isset($_POST['login'])
        && !empty($_POST['username'])
        && !empty($_POST['password'])
    ) {
        if (
            $_POST['username'] == 'Tomas' &&
            $_POST['password'] == '1234'
        ) {
            $_SESSION['logged_in'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = 'Tomas';
            
        } else {
            $msg = 'Wrong username or password';
        }
    }
    ?>

    <?php
    if ($_SESSION['logged_in'] == true) {
        header('Location: /snac/dir.php');
    }
    ?>


    <form action="" method="post">
        <h4><?php echo $msg; ?></h4>
        <input type="text" name="username" placeholder="username = Tomas" required autofocus></br>
        <input type="password" name="password" placeholder="password = 1234" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
    </form>


</body>

</html>