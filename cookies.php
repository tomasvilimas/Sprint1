<!DOCTYPE html>
<?php 
    if(!isset($_COOKIE["kartai"]))
        $kartai = 1;
    else
        $kartai = $_COOKIE["kartai"] + 1;
    setcookie("kartai", $kartai, time()+60);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php print ("<div>".$kartai."</div>"); ?>
</body>
</html>