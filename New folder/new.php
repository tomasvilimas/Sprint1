<!DOCTYPE html>
<?php
function createDirectory()
{
    $add = $_POST["add"];
    mkdir($add);
    echo "successfuly created";
}
?>
<html>

<head>
    <title>
        New directory
    </title>
</head>

<body>
    <?php
    if (!isset($_POST['submit'])) {
    ?>
        <form action="" method="post">
            <input type="text" placeholder="name of new directory" style="width: 220px;" class="form-control" name="add" id="add" />
            <input type="submit" name="submit" value="Create directory" />
        </form>
    <?php
    } else {
        createDirectory();
    }
    ?>
</body>

</html>