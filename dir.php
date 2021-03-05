<?php session_start();


$pathArray = explode('\\', getcwd());
$lastPathElement = end($pathArray);


if (isset($_GET['action']) and $_GET['action'] == 'logout') {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['logged_in']);

    $_SESSION['logout'] = "atsijungta";
    header('Location: /snac/index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files Browser</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>

            </tr>
        </thead>

        <body>
            <?php
            $path = $_GET['path'];
            if (isset($path)) {
                $dir = '.' . $path;
            } else {
                $dir = '.';
            }
            $dirResults = array_diff(scandir($dir), array('..', '.'));
            foreach ($dirResults as $dirResult) {
                if (is_dir($dir . '/' . $dirResult)) {
                    $type = 'Directory';
                    $name = '<a href="?path=' . $path . '/' . $dirResult . '">' . $dirResult . '</a>';
                } else {
                    $type = 'File';
                    $name = $dirResult;
                }
                print('<tr><td>' . $type . '</td>');
                print('<td>' . $name . '</td>');
            }


            if ($_SESSION['logout']) {
                print($_SESSION['logout']);
                unset($_SESSION['logout']);
            }

            if (isset($_FILES['image'])) {
                $errors = array();
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];

                $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
                $extensions = array("jpeg", "jpg", "png");
                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }
                if ($file_size > 2097152) {
                    $errors[] = 'File size must be smaller than 2 MB';
                }
                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, $_GET['path'] . $file_name);
                    echo "Success";
                } else {
                    print_r($errors);
                }
            }


            

                
            

            function createDirectory()
            {
                
                
                $add = $_GET['path'] .   $_POST["add"];
                mkdir($add);
                echo "successfuly created";
            }

            

            ?>


    </table>

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

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" id="image" style="display:none;" />
        <button style="display: block; width: 15%" type="button">
            <label for="image">Choose file</label>
        </button>
        <button style="display: block; width: 15%" type="submit">Upload file</button>
    </form>

    <button onclick="history.go(-1);">Back </button>



    <a href="index.php?action=logout"><button>Logout</button></a>









</body>

</html>