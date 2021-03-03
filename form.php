<?php session_start();

if(isset($_GET['action']) and $_GET['action'] == 'logout'){
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['logged_in']);
    // print('Logged out!');
    $_SESSION['logout'] = "atsijungta";
    header('Location: /snac/form.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forma</title>
</head>
<body>

<?php
if (isset($_POST['login']) 
&& !empty($_POST['username']) 
&& !empty($_POST['password'])
) {	if ($_POST['username'] == 'Tomas' && 
    $_POST['password'] == '1234'
  ) {
    $_SESSION['logged_in'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = 'Tomas';
    echo 'You have entered valid user name and password';
 } else {
    $msg = 'Wrong username or password';
 }
}

if( $_SESSION['logout']){
    print  ($_SESSION['logout']);
    unset($_SESSION['logout']);
}

?>
 <?php 
            if($_SESSION['logged_in'] == true){
               print('<h1>You can only see this if you are logged in!</h1>');
            }
        ?>


<form action="" method="post">
            <h4><?php echo $msg; ?></h4>
            <input type="text" name="username" placeholder="username = Tomas" required autofocus></br>
            <input type="password" name="password" placeholder="password = 1234" required>
            <button class = "btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
        </form>

        Click here to <a href = "form.php?action=logout"> logout.
</body>
</html>