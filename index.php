<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ahaa</title>
</head>

<body>
    
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>
                
            
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
            ?>
        </tbody>
    </table>
</body>

</html>