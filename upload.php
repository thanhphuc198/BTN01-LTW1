<?php 
if (isset($_POST['submit']))
{
    $file = $_FILES['file'];
    //print_r($file);
    $fileName =$_FILES['file']['name'];
    $fileTmpName =$_FILES['file']['tmp_name'];
    $fileSize =$_FILES['file']['size'];
    $fileError =$_FILES['file']['error'];
    $fileType =$_FILES['file']['type'];
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');
    if(in_array($fileExt,$allowed)){
        if($fileError === 0){
            if($fileSize<1000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination ='uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Locatio: index.php?uploadsuccess");

            }else{
                echo "Anh co dung luong qua lon!";
            }

        }else{
            echo "khong the up file nay";
        }

    }else{
        echo "Khong the dang tai file nay!";
    }
}
?>