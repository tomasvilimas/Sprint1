<?php 
    

    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];

        $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
        $extensions = array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        if($file_size > 2097152) {
            $errors[]='File size must be smaller than 2 MB';
        }
        if(empty($errors)==true) {
            move_uploaded_file($file_tmp,"./".$file_name);
            echo "Success";
        }else{
            print_r($errors);
        }
    }

        
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>

      <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" id="image" style="display:none;"/>
                <button style="display: block; width: 15%" type="button">
                    <label for="image">Choose file</label>
                </button>
                <button style="display: block; width: 15%" type="submit">Upload file</button>
         </form>


</body>
</html>